<?php

namespace Finance\Http\Controllers;

use Finance\Category;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;
use Session;
use Redirect;
use Finance\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Finance\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Repositories\TransactionRepository;
use App\Repositories\CategoryRepository;

class TransactionController extends Controller
{

    protected $TransactionRepo;
    protected $CategoryRepo;
    protected $user;

    /**
     * TransactionController constructor.
     * @param TransactionRepository $transactionRepository
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(
        TransactionRepository $transactionRepository,
        CategoryRepository $categoryRepository
    )
    {
        $this->TransactionRepo = $transactionRepository;
        $this->CategoryRepo = $categoryRepository;
        $this->middleware('auth');
        $this->user = Auth::user();
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


        return view('transaction.index', [
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
        return view('transaction.create', [
            'title' => trans('helper.transaction')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**
         * In case the is uploaded an CSV with the transactions,
         * will import from all transactions inside
         */
        if ($request->hasFile('file')) {
            if ($request->file('file')->isValid()) {
                $destinationPath = 'resources/upload/transaction';
                $extension = strtolower($request->file('file')->getClientOriginalExtension());
                $fileName = $this->user->id . '-' . rand(11111, 99999) . '.' . $extension;
                $request->file('file')->move($destinationPath, $fileName);

                $this->importTransactionsFromCSV($destinationPath . '/' . $fileName);

                Session::flash('success', 'Upload successfully');
                return redirect('/' . trans('routes.transactions'));
            } else {
                Session::flash('error', 'uploaded file is not valid');
                return redirect('/' . trans('routes.transactions'));
            }
        }

        $lastTransaction = $this->TransactionRepo->lastTransaction();


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
            'user_id' => $this->user->id,
            'category_id' => $request['category'],
            'provider_id' => null
        );

        \Finance\Transaction::create($values);

        return redirect('/' . trans('routes.transactions'))->with('message', 'store');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = $this->getGroupedCategories();

        return view('transaction.update', [
            'title' => trans('helper.transaction'),
            'transaction' => $this->TransactionRepo->byId($id),
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $transaction = $this->TransactionRepo->byId($id);
        $transaction->fill($request->all());
        $transaction->save();

        $conceptCategory = DB::table('concept_category')->where('concept', '=', $request['concept'])->get();

        if (empty($conceptCategory)) {
            DB::table('concept_category')->insert(
                [
                    'category_id' => $request['category_id'],
                    'concept' => $request['concept'],
                    'created_at' => DATE('Y-m-d H:i:s')
                ]
            );
        }


        $allUncategorized = $this->TransactionRepo->byConcept($request['concept']);

        foreach ($allUncategorized as $uncategorized) {
            $uncategorized->category_id = $transaction->category_id;
            $uncategorized->data = $transaction->data;
            $uncategorized->save();
        }

        return redirect('/' . trans('routes.transactions'))->with('message', 'updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction = $this->TransactionRepo->byId($id);
        $transaction->delete();
        return redirect(trans('routes.transactions'));
    }

    /**
     * Read a CSV file and import each record to the transaction database
     *
     * @param $file
     */
    public function importTransactionsFromCSV($file)
    {
        $categoryConcepts = Cache::remember('concept_category', 1, function () {
            return DB::table('concept_category')->get(array('concept', 'category_id'));
        });

        $relations = array();

        foreach ($categoryConcepts as $relation) {
            $relations[$relation['concept']] = $relation['category_id'];
        }

        $csv_content = array_reverse(array_map('str_getcsv', file($file)));

        foreach ($csv_content as $row) {
            $amount = str_replace('.', '', $row[4]);
            $accountBalance = str_replace('.', '', $row[5]);
            $values = array(
                'concept' => $row[0],
                'data' => $row[3],
                'amount' => (int)$amount,
                'account_balance' => (int)$accountBalance,
                'datetime' => date('Y-m-d', strtotime(str_replace('/', '-', $row[2]))),
                'billing' => (int)$row[4] > 0 ? 0 : 1,
                'user_id' => $this->user->id,
                'category_id' => isset($relations[$row[0]]) ? $relations[$row[0]] : null,
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

        return view('transaction.index', [
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
        $transactions = $this->TransactionRepo->uncategorized();


        return view('transaction.index', [
            'title' => trans('helper.transaction'),
            'tableData' => $transactions,
        ]);
    }

    /**
     * Search all categories and organize them by "Category => SubCategory[]"
     *
     * @return array
     */
    public function getGroupedCategories()
    {
        $categories = $this->CategoryRepo->getGrouped();

        $allCategories = array();

        foreach ($categories as $key => $category) {

            if (
                isset($categoryName) && $categoryName != $category->categoryName
            ) {
                $allCategories[$categoryName] = $subCategory;
                unset($subCategory);
            }

            $subCategory[] = array(
                'id' => $category->subCategoryId,
                'name_es' => $category->subCategoryName,
                'asdf' => $category->categoryName
            );

            if ($key + 1 == count($categories)) {
                $allCategories[$categoryName] = $subCategory;
            }

            $categoryName = $category->categoryName;
        }

        return $allCategories;
    }

    /**
     * Filter the transactions by given Date
     * and return a view with a list of these transactions
     *
     * @param string $date
     * @return View
     */
    public function byDate($date)
    {
        $transactions = $this->TransactionRepo->byDate($date);

        return view('transaction.index', [
            'title' => trans('helper.transaction'),
            'tableData' => $transactions,
        ]);
    }
}
