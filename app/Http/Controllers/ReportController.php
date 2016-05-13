<?php

namespace Finance\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Repositories\TransactionRepository;
use Finance\Http\Requests;

/**
 * This controller's mission is to manage the processes
 * to show the views for all the reports
 *
 * Class ReportController
 * @package Finance\Http\Controllers
 */
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
            'type' => 'warning',
            'title' => 'Prevision',
            'content' => 'content'
        );

        $data['panels']['panel3'] = array(
            'type' => 'danger',
            'title' => 'Gastos',
            'content' => 'content'
        );

        $data['panels']['panel4'] = array(
            'type' => 'info',
            'title' => 'Objetivos',
            'content' => 'content'
        );

        $accountBalances = $this->TransactionRepo->accountBalanceSummary()->all();

        foreach ($accountBalances as $accountBalance){
            $label[] = DATE('Y-m', strtotime($accountBalance->datetime));
            $line1[] = $accountBalance->account_balance;
        }

        $data['charts']['accountBalance']['label'] = json_encode($label);
        $data['charts']['accountBalance']['line1'] = json_encode($line1);

        return view('report.index',[
            'title' => 'Dashboard',
            'data' => $data
        ]);
    }
}
