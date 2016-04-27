<?php

namespace Finance\Http\Controllers;

use Finance\Category;
use Illuminate\Support\Facades\Cache;
use Session;
use Redirect;
use Finance\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Finance\Http\Requests;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{

    /**
     * TransactionController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::select(DB::raw('*'))
            ->whereBetween('datetime', array('2016-01-01', '2016-01-31'))
            ->orderBy('datetime', 'Desc')
            ->get();


        return view('transaction.index',[
            'title' => trans('helper.transaction'),
            'tableData' => $transactions,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transaction.create',[
            'title' => trans('helper.transaction')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userId = Auth::user()->id;

        if ($request->hasFile('file')) {
            if ($request->file('file')->isValid()) {
                $destinationPath = 'resources/upload/transaction';
                $extension = strtolower($request->file('file')->getClientOriginalExtension());
                $fileName = $userId . '-' . rand(11111, 99999) . '.' . $extension;
                $request->file('file')->move($destinationPath, $fileName);

                $this->importTransactionsFromCSV($destinationPath . '/' . $fileName);

                Session::flash('success', 'Upload successfully');
                return redirect('/transactions');
            } else {
                Session::flash('error', 'uploaded file is not valid');
                return redirect('/transactions');
            }
        }

        $lastTransaction = Transaction::where('user_id', $userId)
            ->orderBy('id', 'desc')
            ->take(1)
            ->get();


        if (isset($lastTransaction[0])) {
            $account_balance = $lastTransaction[0]->account_balance + $request['amount'];
        } else {
            $account_balance = $request['amount'];
        }

        $values = array(
            'concept' => $request['concept'],
            'data' => $request['data'],
            'amount' => $request['amount'],
            'account_balance' => $account_balance,
            'datetime' => date('Y-m-d H:i:s'),
            'billing' => $request['amount'] > 0 ? 0 : 1,
            'user_id' => $userId,
            'category_id' => $request['category'],
            'provider_id' => null
        );

        \Finance\Transaction::create($values);

        return redirect('/transactions')->with('message', 'store');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = $this->getGroupedCategories();

        return view('transaction.update', [
            'title' => trans('helper.transaction'),
            'transaction' => Transaction::find($id),
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $transaction = Transaction::find($id);
        $transaction->fill($request->all());
        $transaction->save();

        $allUncategorized = Transaction::where('concept', '=', $request['concept'])->get();

        foreach($allUncategorized as $uncategorized) {
            $uncategorized->category_id = $transaction->category_id;
            $uncategorized->data = $transaction->data;
            $uncategorized->save();
        }

        return redirect('/transactions')->with('message', 'updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Read a CSV file and import each record to the transaction database
     *
     * @param $file
     */
    public function importTransactionsFromCSV($file){

        $categoryConcepts = Cache::remember('concept_category', 30, function(){
            return DB::table('concept_category')->get(array('concept','category_id'));
        });

        $relations = array();

        foreach ($categoryConcepts as $relation){
            $relations[$relation['concept']] = $relation['category_id'];
        }

        $csv_content = array_reverse(array_map('str_getcsv', file($file)));

        foreach ($csv_content as $row){
            $amount = str_replace('.', '', $row[4]);
            $accountBalance = str_replace('.', '', $row[5]);
            $values = array(
                'concept' => $row[0],
                'data' => $row[3],
                'amount' => (int)$amount,
                'account_balance' => (int)$accountBalance,
                'datetime' => date('Y-m-d', strtotime(str_replace('/', '-', $row[2]))),
                'billing' => (int)$row[4] > 0 ? 0 : 1,
                'user_id' => Auth::user()->id,
                'category_id' => isset($relations[$row[0]])?$relations[$row[0]]:null,
                'provider_id' => null
            );
            \Finance\Transaction::create($values);
        }
    }

    /**
     * Return a list of transactions with the same "concept" than received
     *
     * @param string $concept
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function concept($concept)
    {
        $transactions = Transaction::select(DB::raw('*'))
            ->where('concept', '=', $concept)
            ->orderBy('datetime', 'Desc')
            ->get();


        return view('transaction.index',[
            'title' => trans('helper.transaction'),
            'tableData' => $transactions,
        ]);
    }

    /**
     * Return a list of transactions without category
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function notice()
    {
        $transactions = Transaction::select(DB::raw('*'))
            ->where('category_id', '=', null)
            ->groupBy('concept')
            ->orderBy('datetime','desc')
            ->get();


        return view('transaction.index',[
            'title' => trans('helper.transaction'),
            'tableData' => $transactions,
        ]);
    }

    /**
     * @return array
     */
    public function getGroupedCategories() {

        $categories = Category::join('category as sub','category.id', '=', 'sub.parent_id')
            ->get(
                array(
                    'category.name_es as categoryName',
                    'sub.name_es as subCategoryName',
                    'sub.id as subCategoryId'
                )
            );


        $allCategories = array();


        foreach ($categories as $key => $category){

            $subCategory[] = array(
                'id' => $category->subCategoryId,
                'name_es' => $category->subCategoryName,
            );

            if(
                isset($categoryName) &&
                ($key + 1 == count($categories) || $categoryName != $category->categoryName)
            ){
                $allCategories[$categoryName] = $subCategory;
                unset($subCategory);
            }

            $categoryName = $category->categoryName;
        }

        return $allCategories;
    }
}
