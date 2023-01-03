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

    public function reportHome(Request $request)
    {
        if ($request->bulan == null) {
            $dateNow = Carbon::now();
            $dateNowMonth = $dateNow->format('m');
            $dateNowYear = $dateNow->format('Y');
        } else {
            $dateNowMonth = $request->bulan;
            $dateNowYear = $request->tahun;
        }

        $stepProgress = ['Waiting', 'On Progress', 'Seal Kit', 'Trial', 'Finish', 'Scrap'];
        $week = [
            1 => 7,
            8 => 14,
            15 => 21,
            22 => 28,
            29 => 31
        ];
        $month = [
            1 => 'Jan',
            2 => 'Feb',
            3 => 'Mar',
            4 => 'Apr',
            5 => 'May',
            6 => 'Jun',
            7 => 'Jul',
            8 => 'Aug',
            9 => 'Sep',
            10 => 'Oct',
            11 => 'Nov',
            12 => 'Dec',
        ];

        if ($request->groupBy == 'Week' || $request->groupBy == null) {
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

                    $costSaving['actual']['W' . $w] = DB::table('finishrepairs')
                        ->whereMonth('f_date', '=', $dateNowMonth)
                        ->whereYear('f_date', '=', $dateNowYear)
                        ->whereBetween('f_date', [Carbon::parse($dateNowYear . '-' . $dateNowMonth . '-' . $start)->format('Y-m-d'), Carbon::parse($dateNowYear . '-' . $dateNowMonth . '-' . $finish)->format('Y-m-d')])
                        ->sum('f_total_cost_saving') / 1000000; // dibagi 1jt untuk scale

                    $costSaving['target']['W' . $w] = (float) 1300000000 / 5 / 1000000; // dibagi 1jt untuk scale
                    $w++;
                }
            }

            $qty['xAxis'] = ['W1', 'W2', 'W3', 'W4', 'W5',];
            $costSaving['xAxis'] = ['W1', 'W2', 'W3', 'W4', 'W5',];
            $groupBy = 'Week';
        } else if ($request->groupBy == 'Month') {
            foreach ($stepProgress as $step) {
                foreach ($month as $index => $mo) {
                    $qty[$step][$mo] = DB::table('waitingrepairs')
                        ->whereMonth('date', '=', $index)
                        ->whereYear('date', '=', $dateNowYear)
                        ->where('progress', $step)
                        ->count();

                    $qty['total'][$mo] = DB::table('waitingrepairs')
                        ->whereMonth('date', '=', $index)
                        ->whereYear('date', '=', $dateNowYear)
                        ->count();

                    $costSaving['actual'][$mo] = DB::table('finishrepairs')
                        ->whereMonth('f_date', '=', $index)
                        ->whereYear('f_date', '=', $dateNowYear)
                        ->sum('f_total_cost_saving') / 1000000; // dibagi 1jt untuk scale

                    $costSaving['target'][$mo] = (float) 1300000000 / 1000000; // dibagi 1jt untuk scale
                }
            }

            $qty['xAxis'] = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            $costSaving['xAxis'] = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            $groupBy = 'Month';
        } else {
            $qty = [];
            $costSaving = [];
            $groupBy = [];
        }

        return view('report.index', [
            'qty' => $qty,
            'costSaving' => $costSaving,
            'groupBy' => $groupBy,
        ]);
    }
}
