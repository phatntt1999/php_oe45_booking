<?php

namespace App\Http\Controllers;

use App\Models\BookingTour;
use App\Repositories\Tour\TourRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    protected $tourRepo;
    public function __construct(TourRepositoryInterface $tourRepo)
    {
        $this->tourRepo = $tourRepo;
    }
    public function chart(Request $request)
    {

        $filter = $request->filter;

        if ($filter == 'weekly') {
            $re = BookingTour::select([
                DB::raw('DATE(created_at) AS date'),
                DB::raw('SUM(total_price) as price')
            ])->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])
                ->groupBy('date')
                ->orderBy('date', 'ASC')
                ->get();
            $datas = array();
            $date = Carbon::now()->subDays(6);
            for ($i = 0; $i < 7; $i++) {
                $dateString = $date->format('M j');
                $datas[$dateString] = 0;
                $date->addDay();
            }
            foreach ($re as $data) {
                $date = date('M j', strtotime($data['date']));
                $datas[$date] = $data['price'];
            }
        } elseif ($filter == 'yearly') {
            $re = BookingTour::select([
                DB::raw('Year(created_at) AS date'),
                DB::raw('SUM(total_price) as price')
            ])->whereBetween('created_at', [Carbon::now()->subYears(5), Carbon::now()])
                ->groupBy('date')
                ->orderBy('date', 'ASC')
                ->get();
            $datas = array();
            $date = Carbon::now()->subYears(4);
            for ($i = 0; $i < 5; $i++) {
                $dateString = $date->format('Y');
                $datas[$dateString] = 0;
                $date->addYear();
            }
            foreach ($re as $data) {
                $date = $data['date'];

                $datas[$date] = $data['price'];
            }
        } else {
            $re = BookingTour::select([
                DB::raw('DATE(created_at) AS date'),
                DB::raw('SUM(total_price) as price')
            ])->whereBetween('created_at', [Carbon::now()->subMonths(12), Carbon::now()])
                ->groupBy('date')
                ->orderBy('date', 'ASC')
                ->get();
            $datas = array();
            $date = Carbon::now()->subMonths(11);
            for ($i = 0; $i < 12; $i++) {
                $dateString = $date->format('M y');
                $datas[$dateString] = 0;
                $date->addMonth();
            }
            foreach ($re as $data) {
                $date = date('M', strtotime($data['date']));
                $datas[$date] = $data['price'];
            }
        }
        $response = json_encode($datas);

        return $response;
    }
}
