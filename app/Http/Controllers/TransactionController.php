<?php

namespace Finance\Http\Controllers;

use Finance\Transaction;
use Illuminate\Http\Request;

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
        return view('transaction.index',[
            'title' => trans('helper.transaction'),
            'tableData' => Transaction::all()
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

        $account_balance = DB::table('transaction')->where('id', '=', $userId)->sum('amount') + $request['amount'];

        $values = array(
            'concept' => $request['concept'],
            'data' => $request['data'],
            'amount' => $request['amount'],
            'account_balance' => $account_balance,
            'datetime' => date('Y-m-d H:i:s'),
            'billing' => $request['amount']>0?0:1,
            'user_id' => $userId,
            'category_id' => $request['category'],
            'provider_id' => null
        );

        \Finance\Transaction::create($values);

        return redirect('/transactions')->with('message','store');
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
        //
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
        //
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
}
