<?php

namespace Finance\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class MonthlyResume extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'datapicker:monthlyresume';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Do a resume of cash in and cash out per month';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $summaries = DB::table('transaction')
            ->where('exception', '=', '0')
            ->select(DB::raw('
                MONTH(datetime) AS month,
                YEAR(datetime)  AS year,
                SUM(CASE WHEN billing = 1 THEN amount ELSE 0 END) AS cashOut,
                SUM(CASE WHEN billing = 0 THEN amount ELSE 0 END) AS cashIn,
                user_id
            '))
            ->groupBy(DB::raw('
                MONTH(datetime),
                YEAR(datetime),
                user_id
            '))
            ->orderBy(DB::raw('
                YEAR(datetime),
                MONTH(datetime),
                user_id
            '))
            ->get();


        foreach ($summaries as $summary) {
            DB::table('monthly_summary')->insert(
                [
                    'month' => $summary['month'],
                    'year' => $summary['year'],
                    'cashOut' => $summary['cashOut'],
                    'cashIn' => $summary['cashIn'],
                    'user_id' => $summary['user_id'],
                ]
            );
        }

        echo "All right";
    }
}
