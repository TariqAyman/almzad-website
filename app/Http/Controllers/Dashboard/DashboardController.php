<?php

namespace App\Http\Controllers\Dashboard;

use App\Charts\AppChart;
use App\Charts\UsersChart;
use App\Http\Controllers\Controller;
use App\Models\Auction;
use App\Models\AuctionsUser;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $usersPerMonth = $this->countOfNewModelPerMonth(
            User::class,
            Carbon::now()->subYear()->startOfMonth(),
            Carbon::now()->endOfMonth()
        );

        $auctionsPerMonth = $this->countOfNewModelPerMonth(
            Auction::class,
            Carbon::now()->subYear()->startOfMonth(),
            Carbon::now()->endOfMonth()
        );

        $auctionsUserPerMonth = $this->countOfNewModelPerMonth(
            AuctionsUser::class,
            Carbon::now()->subYear()->startOfMonth(),
            Carbon::now()->endOfMonth()
        );

        $transactionPerMonth = $this->countOfNewModelPerMonth(
            Transaction::class,
            Carbon::now()->subYear()->startOfMonth(),
            Carbon::now()->endOfMonth()
        );

        $stats = [
            'users' => [
                'new' => User::whereBetween('created_at', [Carbon::now()->firstOfMonth(), Carbon::now()])->count(),
                'active' => User::where('status', 1)->count(),
                'banned' => User::where('status', 0)->count(),
            ],
            'auction' => [
                'new' => Auction::whereBetween('created_at', [Carbon::now()->firstOfMonth(), Carbon::now()])->count(),
                'active' => Auction::where('status', 1)->count(),
                'banned' => Auction::where('status', 0)->count(),
                'expired' => Auction::where('end_date','<=', Carbon::now())->count(),
                'notExpired' => Auction::where('end_date','>=', Carbon::now())->count(),
                'new_bids' => AuctionsUser::whereBetween('created_at', [Carbon::now()->firstOfMonth(), Carbon::now()])->count(),
                'bids' => AuctionsUser::count(),
            ]
        ];

        $userChart = new AppChart();
        $userChart->labels(array_keys($usersPerMonth));
        $userChart->dataset(trans('app.users_history'), 'line', array_values($usersPerMonth));

        $auctionsChart = new AppChart();
        $auctionsChart->labels(array_keys($auctionsPerMonth));
        $auctionsChart->dataset(trans('app.auction_history'), 'line', array_values($auctionsPerMonth));

        $transactionChart = new AppChart();
        $transactionChart->labels(array_keys($transactionPerMonth));
        $transactionChart->dataset(trans('app.transaction_history'), 'line', array_values($transactionPerMonth));

        $auctionsUserChart = new AppChart();
        $auctionsUserChart->labels(array_keys($auctionsUserPerMonth));
        $auctionsUserChart->dataset(trans('app.transaction_history'), 'line', array_values($auctionsUserPerMonth));

        return view('dashboard.dashboard', compact('transactionChart', 'auctionsChart', 'userChart', 'auctionsUserChart','stats'));
    }

    public function countOfNewModelPerMonth($model, Carbon $from, Carbon $to)
    {
        $result = $model::whereBetween('created_at', [$from, $to])
            ->orderBy('created_at')
            ->get(['created_at'])
            ->groupBy(function ($user) {
                return $user->created_at->format("Y_n");
            });

        $counts = [];

        while ($from->lt($to)) {
            $key = $from->format("Y_n");

            $counts[$this->parseDate($key)] = count($result->get($key, []));

            $from->addMonth();
        }

        return $counts;
    }

    private function parseDate($yearMonth)
    {
        list($year, $month) = explode("_", $yearMonth);

        $month = trans("app.months.{$month}");

        return "{$month} {$year}";
    }
}
