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
            $transaction = Cache::get('byId' . $id);
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


    /**
     * Give the current year account balance by day
     *
     * @return mixed
     */
    public function accountBalanceSummary()
    {
        return Transaction::where('user_id', $this->user->id)
            ->where(DB::raw('YEAR(datetime)'), '=', DB::raw('YEAR(CURDATE())'))
            ->orderBy('datetime', 'asc')
            ->groupBy(DB::raw("DATE(datetime)"))
            ->get(array('account_balance', 'datetime'));
    }

    /**
     * Get the Transactions between 2 dates
     *
     * @param $dateFrom
     * @param $dateTo
     * @return mixed
     */
    public function getAllBetweenDates($dateFrom, $dateTo)
    {
        return Transaction::whereBetween('datetime', array($dateFrom, $dateTo))
            ->orderBy('datetime', 'Desc')
            ->get();
    }

    /**
     * @param $dateFrom
     * @param $dateto
     */
    public function getCumulativeBillingBetweenDates($dateFrom, $dateTo)
    {
        return Transaction::select(DB::raw('
            SUM(case when billing = 1 then amount else 0 end) as negative,
            SUM(case when billing = 0 then amount else 0 end) as positive,
            datetime
        '))
            ->whereBetween('datetime', array($dateFrom, $dateTo))
            ->where('exception', '=', 0)
            ->groupBy(DB::raw('datetime'))
            ->orderBy('datetime', 'ASC')
            ->get();
    }

    /**
     * @param $dateFrom
     * @param $dateto
     */
    public function getCumulativeBillingByCategoryBetweenDates($dateFrom, $dateTo)
    {
        return Transaction::select(DB::raw('
            SUM(case when category.parent_id = 1 then amount else 0 end) as category1,
            SUM(case when category.parent_id = 2 then amount else 0 end) as category2,
            SUM(case when category.parent_id = 3 then amount else 0 end) as category3,
            SUM(case when category.parent_id = 4 then amount else 0 end) as category4,
            SUM(case when category.parent_id = 5 then amount else 0 end) as category5,
            SUM(case when category.parent_id = 6 then amount else 0 end) as category6,
            SUM(case when category.parent_id = 7 then amount else 0 end) as category7,
            SUM(case when category.parent_id = 8 then amount else 0 end) as category8,
            DATE(datetime) as datetime
        '))
            ->join('category', 'transaction.category_id', '=', 'category.id')
            ->where('exception', '=', 0)
            ->whereBetween('datetime', array($dateFrom, $dateTo))
            ->groupBy(DB::raw('DATE(datetime)'))
            ->orderBy('datetime', 'ASC')
            ->get();
    }

}