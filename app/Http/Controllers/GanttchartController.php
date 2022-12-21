<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Carbon\Carbon;
use App\Waitingrepair;
use App\Progressrepair;
use App\Section;
use App\Line;
use App\Http\Requests;

class GanttchartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $tester = DB::table('progressrepairs')
            ->whereMonth('created_at', '=', Carbon::now()->format('m'))
            ->whereYear('created_at', '=', Carbon::now()->format('Y'))
            ->get();
        $tester2 = DB::table('waitingrepairs')
        ->whereMonth('created_at', '=', Carbon::now()->format('m'))
        ->whereYear('created_at', '=', Carbon::now()->format('Y'))
        ->select('item_name')
        ->get();

        foreach($tester as $index => $value) {
            // dd($value);
            $data[$index] =[
                'x' => $value->analisa,
                'y' => $value->created_at,
                'z' => $value->updated_at,
                'o' => '2019-03-05',
                'p' => '2019-03-07'
                        ];
        }
        // dd($data);


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
        $asu = [
            'x : Design', 'On Progress', 'Seal Kit', 'Trial', 'Finish', 'Scrap'
        ];

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

        return view('partrepair/ganttchart', [
            'dataRepairAll' => $dataRepairAll,
            'qty' => $qty,
            'date' => Carbon::now()->format('Y-m'),
            'counting' => $counting,
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
}
