<?php

namespace App\Repositories;

use Finance\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class TransactionRepository
{
    protected $user;

    /**
     * TransactionRepository constructor.
     */
    public function __construct()
    {
        $this->user = Auth::user();
    }

    /**
     * Find a transaction by id
     *
     * @param $id
     * @return array
     */
    public function byId($id)
    {
        if (Cache::has('byId' . $id)) {
            $transaction =  Cache::get('byId' . $id);
        } else {
            $transaction = Transaction::find($id);
            Cache::put('byId' . $id, $transaction, 1);
        }
        return $transaction;
    }

    /**
     * Find all transaction by datetime
     *
     * @param $date
     * @return array
     */
    public function byDate($date)
    {
        return Transaction::select(DB::raw('*'))
            ->where('user_id', '=', $this->user->id)
            ->where(DB::raw('DATE(datetime)'), '=', DATE('Y-m-d', strtotime($date)))
            ->get();
    }

    /**
     * Find all transaction by concept
     *
     * @param $concept
     * @return array
     */
    public function byConcept($concept)
    {
        return Transaction::where('concept', '=', $concept)
            ->where('user_id', '=', $this->user->id)
            ->get();
    }

    /**
     * Find all transaction without category_id
     *
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
     * Find the user's last transaction
     *
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