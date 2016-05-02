<?php

namespace App\Repositories;

use Finance\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionRepository
{
    protected $user;

    public function __construct()
    {
        $this->user = Auth::user();
    }

    public function find($id)
    {
        return Transaction::find($id);
    }

    /**
     * @param $date
     */
    public function byDate($date)
    {
        return Transaction::select(DB::raw('*'))
            ->where('user_id', '=', $this->user->id)
            ->where(DB::raw('DATE(datetime)'), '=', DATE('Y-m-d', strtotime($date)))
            ->get();
    }

    /**
     * @return array
     */
    public function uncategorized()
    {
        return Transaction::select(DB::raw('*'))
            ->where('category_id', '=', null)
            ->where('user_id', '=', $this->user->id)
            ->groupBy('concept')
            ->orderBy('datetime', 'desc')
            ->get();
    }

    /**
     * @return array
     */
    public function lastTransaction()
    {
        return Transaction::where('user_id', $this->user->id)
            ->orderBy('id', 'desc')
            ->take(1)
            ->get();
    }
}