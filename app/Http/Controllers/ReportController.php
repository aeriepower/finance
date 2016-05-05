<?php

namespace Finance\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Repositories\TransactionRepository;
use Finance\Http\Requests;

class ReportController extends Controller
{
    protected $TransactionRepo;
    protected $user;

    /**
     * ReportController constructor.
     * @param TransactionRepository $transactionRepository
     */
    public function __construct(
        TransactionRepository $transactionRepository
    ) {
        $this->TransactionRepo = $transactionRepository;
        $this->middleware('auth');
        $this->user = Auth::user();
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
            'title' => 'Ahorro',
            'content' => 'content'
        );

        $data['panels']['panel2'] = array(
            'type' => 'info',
            'title' => 'Prevision',
            'content' => 'content'
        );

        $data['panels']['panel3'] = array(
            'type' => 'warning',
            'title' => 'Gastos',
            'content' => 'content'
        );

        $data['panels']['panel4'] = array(
            'type' => 'danger',
            'title' => 'Objetivos',
            'content' => 'content'
        );

        return view('report.index',[
            'title' => 'Dashboard',
            'data' => $data
        ]);
    }
}
