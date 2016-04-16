<?php

namespace Finance\Http\Controllers;

use Illuminate\Http\Request;

use Finance\Http\Requests;

class ReportController extends Controller
{
    /**
     * ReportController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('report.index',[
            'title' => 'Dashboard'
        ]);
    }
}
