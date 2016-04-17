<?php

namespace Finance\Http\Controllers;

use Session;
use Redirect;
use Illuminate\Http\Request;

use Finance\Http\Requests;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('newuser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request['password'] != $request['repeat']){
           Session::flash('msg-error', trans('form.newuser-passworddoesntmach'));
           return Redirect::to('login');
        }

        $values = array(
            'name' => $request['name'],
            'surname' => $request['surname'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'email' => $request['email'],
            'language' => 'ES',
        );

        if (!empty($request['campaign'])){
            $values['campaign']  = $request['campaign'];
        }
        if (!empty($request['medium'])){
            $values['medium']  = $request['medium'];
        }
        if (!empty($request['source'])){
            $values['source']  = $request['source'];
        }

        \Finance\User::create($values);

        Session::flash('msg-success', trans('form.newuser-checkemail'));
        return Redirect::to('login');
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
