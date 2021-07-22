<?php

namespace App\Http\Controllers;

use App\Models\BookingTour;
use App\Models\Tour;
use App\Repositories\Tour\TourRepositoryInterface;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use ConsoleTVs\Charts\Facades\Charts;
use Illuminate\Support\Facades\DB;

class RevenueController extends Controller
{
    protected $tourRepo;
    public function __construct(TourRepositoryInterface $tourRepo)
    {
        $this->tourRepo = $tourRepo;
    }

    public function revenue(Request $request)
    {
        $total = null;
        $count = null;
        $cancel_count = null;
        $tours = $this->tourRepo->sortAndPaginate('name', 'asc', config('app.default_paginate_tour'));
        foreach ($tours as $tour) {
            foreach ($tour->users as $booking) {
                $tour->revenue = $booking->pivot->where('status', '=', 0)->where('tour_id', '=', $tour->id)->sum('total_price');
                $a = $booking->pivot->where('status', '=', 0)->where('tour_id', '=', $tour->id);
                $total = $booking->pivot->where('status', '=', 0)->sum('total_price');
                $count = $booking->pivot->where('status', '=', 0)->count();
                $cancel_count = $booking->pivot->where('status', '<>', 0)->count();
            }
        }
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
            $dateString = $date->format('M');
            $datas[$dateString] = 0;
            $date->addMonth();
        }
        foreach ($re as $data) {
            $date = date('M y', strtotime($data['date']));
            $datas[$date] = $data['price'];
        }

        return view('admin.booking_revenue', compact('tours', 'total', 'count', 'cancel_count', 'datas'));
    }
}
