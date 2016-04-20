<?php

namespace Finance\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Finance\Transaction;
use Finance\Http\Requests;

class AnalyticController extends Controller
{
    public function index(Request $request){
        $dateFrom = isset($request['dateFrom'])?date('Y-m-d', strtotime($request['dateFrom'])):'2016-01-01';
        $dateTo = isset($request['dateTo'])?date('Y-m-d', strtotime($request['dateTo'])):'2016-01-31';


        $transactions = Transaction::select(DB::raw('
            SUM(case when billing = 1 then amount else 0 end) as negative,
            SUM(case when billing = 0 then amount else 0 end) as positive,
            datetime
        '))
            ->whereBetween('datetime', array($dateFrom, $dateTo))
            ->groupBy(DB::raw('datetime'))
            ->orderBy('datetime', 'ASC')
            ->get();


        $labels = array();
        $line1 = array(); // Positivos
        $line2 = array(); // Negativos

        $positive = 0;
        $negative = 0;
        foreach ($transactions as $transaction) {
                $labels[] = DATE('d-m-Y',strtotime($transaction->datetime));
                $positive = $positive + $transaction->positive;
                $line1[] = $positive;
                $negative = $negative + ($transaction->negative * -1);
                $line2[] = $negative;
        }

        return view('analytic.index',[
            'title' => trans('helper.transaction'),
            'labels' => json_encode($labels),
            'line1' => json_encode($line1),
            'line2' => json_encode($line2),
            'date' => array(
                'From' => date('m/d/Y', strtotime($dateFrom)),
                'To' => date('m/d/Y', strtotime($dateTo)),
            )
        ]);

    }
}
