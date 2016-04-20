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


        $transactions = Transaction::select(DB::raw('*'))
            ->whereBetween('datetime', array($dateFrom, $dateTo))
            ->orderBy('datetime', 'ASC')
            ->get();


        $labels = array();
        $line1 = array(); // Positivos
        $line2 = array(); // Negativos

        $date = $dateFrom;
        $positive = 0;
        $negative = 0;

        foreach ($transactions as $transaction) {

            $attributes = $transaction->getAttributes();

            if($attributes['amount'] > 0){
                $positive = $positive + ($attributes['amount']);
            } else {
                $negative = $negative + ($attributes['amount'] * -1);
            }

            if(strtotime($date) < strtotime($attributes['datetime'])){
                $labels[] = $date;
                $line1[] = $positive;
                $line2[] = $negative;
                $date = $attributes['datetime'];
            }
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
