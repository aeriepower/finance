<?php

namespace Finance\Http\Controllers;

use Illuminate\Http\Request;

use Finance\Http\Requests;

class ReportController extends Controller
{
    public function index()
    {
        return view('report.index',[
            'title' => 'Dashboard'
        ]);
    }
}
