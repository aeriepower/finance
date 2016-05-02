<?php

namespace App\Repositories;

use Finance\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionRepository
{
    /**
     * @param $date
     */
    public function byDate($date)
    {
        return Transaction::select(DB::raw('*'))
            ->where('user_id', '=', Auth::user()->id)
            ->where(DB::raw('DATE(datetime)'), '=', DATE('Y-m-d', strtotime($date)))
            ->get();
    }

    public function uncategorized(){
        return Transaction::select(DB::raw('*'))
            ->where('category_id', '=', null)
            ->where('user_id', '=', Auth::user()->id)
            ->groupBy('concept')
            ->orderBy('datetime', 'desc')
            ->get();
    }
}