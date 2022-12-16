<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Waitingrepair;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dateNow = Carbon::now();
        $dateNowYear = $dateNow->format('Y');
        $dateNowMonth = $dateNow->format('m');
        $week = [
            1 => 7,
            8 => 14,
            15 => 21,
            22 => 28,
            29 => 31
        ];
        $stepProgress = ['Waiting', 'On Progress', 'Seal Kit', 'Trial', 'Finish', 'Scrap'];

        $dataRepairAll = DB::table('waitingrepairs')
            ->whereMonth('date', '=', Carbon::now()->format('m'))
            ->whereYear('date', '=', Carbon::now()->format('Y'))
            ->get();

        foreach ($stepProgress as $step) {
            $counting[$step] = 0;
            $w = 1;
            foreach ($week as $start => $finish) {
                $qty[$step]['W' . $w] = DB::table('waitingrepairs')
                    ->whereMonth('date', '=', $dateNowMonth)
                    ->whereYear('date', '=', $dateNowYear)
                    ->where('progress', $step)
                    ->whereBetween('date', [Carbon::parse($dateNowYear . '-' . $dateNowMonth . '-' . $start)->format('Y-m-d'), Carbon::parse($dateNowYear . '-' . $dateNowMonth . '-' . $finish)->format('Y-m-d')])
                    ->count();

                $qty['total']['W' . $w] = DB::table('waitingrepairs')
                    ->whereMonth('date', '=', $dateNowMonth)
                    ->whereYear('date', '=', $dateNowYear)
                    ->whereBetween('date', [Carbon::parse($dateNowYear . '-' . $dateNowMonth . '-' . $start)->format('Y-m-d'), Carbon::parse($dateNowYear . '-' . $dateNowMonth . '-' . $finish)->format('Y-m-d')])
                    ->count();

                $counting[$step] = $counting[$step] + $qty[$step]['W' . $w];
                $w++;
            }
        }

        $counting['total'] = 0;
        foreach ($qty['total'] as $index => $item) {
            $counting['total'] = $counting['total'] + $item;
        }

        return view('home', [
            'dataRepairAll' => $dataRepairAll,
            'qty' => $qty,
            'date' => Carbon::now()->format('Y-m'),
            'counting' => $counting,
        ]);
    }
}
