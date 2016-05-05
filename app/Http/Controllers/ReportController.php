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
        $data = array();
        
        $data['panels'] = array();

        $data['panels']['panel1'] = array(
            'type' => 'success',
            'title' => 'title1',
            'content' => 'content'
        );

        $data['panels']['panel2'] = array(
            'type' => 'info',
            'title' => 'title2',
            'content' => 'content'
        );

        $data['panels']['panel3'] = array(
            'type' => 'warning',
            'title' => 'title3',
            'content' => 'content'
        );

        $data['panels']['panel4'] = array(
            'type' => 'danger',
            'title' => 'title4',
            'content' => 'content'
        );

        return view('report.index',[
            'title' => 'Dashboard',
            'data' => $data
        ]);
    }
}
