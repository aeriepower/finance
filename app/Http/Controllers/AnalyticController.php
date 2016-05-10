<?php

namespace Finance\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Finance\Transaction;
use Finance\Http\Requests;
use App\Repositories\TransactionRepository;

class AnalyticController extends Controller
{


    protected $TransactionRepo;
    protected $user;

    /**
     * AnalyticController constructor.
     * @param TransactionRepository $transactionRepository
     */
    public function __construct(TransactionRepository $transactionRepository) {
        $this->TransactionRepo = $transactionRepository;
        $this->middleware('auth');
        $this->user = Auth::user();
    }

    public function index(Request $request)
    {
        $dateFrom = isset($request['dateFrom']) ? date('Y-m-d', strtotime($request['dateFrom'])) : '2016-01-01';
        $dateTo = isset($request['dateTo']) ? date('Y-m-d', strtotime($request['dateTo'])) : '2016-01-31';

        $CumulativeBilling = $this->getCumulativeBilling($dateFrom, $dateTo);
        $cumulativeBillingByCategory = $this->getCumulativeBillingByCategory($dateFrom, $dateTo);

        return view('analytic.index', [
            'title' => trans('helper.transaction'),
            'labels' => json_encode($CumulativeBilling['labels']),
            'line1' => json_encode($CumulativeBilling['line1']),
            'line2' => json_encode($CumulativeBilling['line2']),
            'cumulativeBillingByCategory' => $cumulativeBillingByCategory,
            'date' => array(
                'From' => date('m/d/Y', strtotime($dateFrom)),
                'To' => date('m/d/Y', strtotime($dateTo)),
            )
        ]);

    }

    /**
     * Return an array with the cumulative values of billing and
     *
     * @param $dateFrom
     * @param $dateTo
     * @return array
     */
    private function getCumulativeBilling($dateFrom, $dateTo)
    {
        $transactions = $this->TransactionRepo->getCumulativeBillingBetweenDates($dateFrom, $dateTo);

        $labels = array();
        $line1 = array(); // Positivos
        $line2 = array(); // Negativos

        $positive = 0;
        $negative = 0;
        foreach ($transactions as $transaction) {
            $labels[] = DATE('d-M', strtotime($transaction->datetime));
            $positive = $positive + $transaction->positive;
            $line1[] = $positive;
            $negative = $negative + ($transaction->negative * -1);
            $line2[] = $negative;
        }
        return array(
            'labels' => $labels,
            'line1' => $line1,
            'line2' => $line2,
        );
    }

    private function getCumulativeBillingByCategory($dateFrom, $dateTo)
    {
        $transactions = $this->TransactionRepo->getCumulativeBillingByCategoryBetweenDates($dateFrom, $dateTo);

        $labels = array();
        $line1 = array();
        $line2 = array();
        $line3 = array();
        $line4 = array();
        $line5 = array();
        $line6 = array();
        $line7 = array();
        $line8 = array();

        $cumulative1 = 0; // #058DC7 - rgba(5,141,199,0.2)
        $cumulative2 = 0; // #50B432 - rgba(80,180,50,0.2)
        $cumulative3 = 0; // #ED561B - rgba(237,86,27,0.2)
        $cumulative4 = 0; // #DDDF00 - rgba(221,223,0,0.2)
        $cumulative5 = 0; // #24CBE5 - rgba(36,203,229,0.2)
        $cumulative6 = 0; // #64E572 - rgba(100,229,114,0.2)
        $cumulative7 = 0; // #FF9655 - rgba(255,150,85,0.2)
        $cumulative8 = 0; // #6AF9C4 - rgba(106,249,196,0.2)

        foreach ($transactions as $transaction) {
            $labels[] = DATE('d-M', strtotime($transaction->datetime));

            $cumulative1 = $cumulative1+ ($transaction->category1 * -1);
            $line1[] = $cumulative1;

            $cumulative2 = $cumulative2+ ($transaction->category2 * -1);
            $line2[] = $cumulative2;

            $cumulative3 = $cumulative3+ ($transaction->category3 * -1);
            $line3[] = $cumulative3;

            $cumulative4 = $cumulative4+ ($transaction->category4 * -1);
            $line4[] = $cumulative4;

            $cumulative5 = $cumulative5+ ($transaction->category5 * -1);
            $line5[] = $cumulative5;

            $cumulative6 = $cumulative6+ ($transaction->category6 * -1);
            $line6[] = $cumulative6;

            $cumulative7 = $cumulative7+ ($transaction->category7 * -1);
            $line7[] = $cumulative7;

            $cumulative8 = $cumulative8+ ($transaction->category8 * -1);
            $line8[] = $cumulative8;
        }

        return array(
            'labels' => json_encode($labels),
            'lines' => array(
                'line1' => json_encode($line1),
                'line2' => json_encode($line2),
                'line3' => json_encode($line3),
                'line4' => json_encode($line4),
                'line5' => json_encode($line5),
                'line6' => json_encode($line6),
                'line7' => json_encode($line7),
                'line8' => json_encode($line8),
            )
        );
    }

    /**
     * Get the average of the amount at the year
     *
     * @param $userId
     * @param $year
     * @return mixed
     */
    public function getYearAmountAvg($userId, $year)
    {
        return DB::select(DB::raw("SELECT
              avg(months.amount) AS yearlyAVG
            FROM (
                SELECT
                    sum(amount) as amount
                FROM
                    transaction
                WHERE
                    user_id = :userId
                AND
                    exception = 0
                AND
                    recurrence = 0
                AND
                   billing = 1
                AND
                   YEAR(datetime) = :year
                GROUP BY
                   month(datetime)
            ) as months;"), array(
            'userId' => $userId,
            'year' => $year,
        ));
    }

    /**
     * Get the average of the amount at last years same month
     *
     * @param $userId
     * @param $month
     * @return mixed
     */
    public function getMonthAmountAvg($userId, $month)
    {
        return DB::select(DB::raw("SELECT
              avg(years.amount) AS monthlyAVG
            FROM (
                SELECT
                    sum(amount) AS amount,
                    year(datetime)
                FROM
                    transaction
                WHERE
                    user_id = :userId
                AND
                    exception = 0
                AND
                    recurrence = 0
                AND
                    billing = 1
                AND
                    month(datetime) = :month
                GROUP BY
                  year(datetime)
              ) as years;"), array(
            'userId' => $userId,
            'month' => $month
        ));
    }
}
