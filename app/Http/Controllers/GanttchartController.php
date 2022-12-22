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
        $join = DB::table('waitingrepairs')
        ->join('progressrepairs', 'waitingrepairs.id', '=', 'progressrepairs.form_input_id')
        // ->join('progresspemakaians', 'waitingrepairs.id', '=', 'progresspemakaians.form_input_id')
        ->select('waitingrepairs.*', 'progressrepairs.place_of_repair', 'progressrepairs.analisa','progressrepairs.action', 'progressrepairs.plan_start_repair', 'progressrepairs.plan_finish_repair')
        ->get();

        $count = count(collect($join));
        // dd($join);
        // $waitingrepair = Waitingrepair::all();
        // $tester = DB::table('progressrepairs')
        //     ->whereMonth('created_at', '=', Carbon::now()->format('m'))
        //     ->whereYear('created_at', '=', Carbon::now()->format('Y'))
        //     ->get();
            // dd($waitingrepair);

            // $join = Waitingrepair::join('progressrepairs', 'waitingrepairs.id', '=', 'progressrepairs.form_input_id')
            // ->select('waitingrepair.*', 'progressrepairs.place_of_repair', )
            // ->where('waitingrepair.progress', !=, 'Finish')
            // ->get();
            // dd($join);
        
        // $tester2 = DB::table('waitingrepairs')
        // ->whereMonth('created_at', '=', Carbon::now()->format('m'))
        // ->whereYear('created_at', '=', Carbon::now()->format('Y'))
        // ->select('item_name')
        // ->get();

        foreach($join as $index => $value) {
            // dd($value);
            $data[$index] =[
                'id' => $value->id,
                'created_at' => $value->created_at,
                'updated_at' => $value->updated_at,
                'date' => $value->date,
                'part_from' => $value->part_from,
                'reg_sp' => $value->reg_sp,
                'section' => $value->section,
                'line' => $value->line,
                'machine' => $value->machine,
                'item_code' => $value->item_code,
                'item_name' => $value->item_name,
                'item_type' => $value->item_type,
                'maker' => $value->maker,
                'problem' => $value->problem,
                'nama_pic' => $value->nama_pic,
                'price' => $value->price,
                'status_repair' => $value->status_repair,
                'progress' => $value->progress,
                'place_of_repair' => $value->place_of_repair,
                'analisa' => $value->analisa,
                'action' => $value->action,
                'plan_start_repair' => $value->plan_start_repair,
                'plan_finish_repair' => $value->plan_finish_repair
                        ];
        }


        // $dateNow = Carbon::now();
        // $dateNowYear = $dateNow->format('Y');
        // $dateNowMonth = $dateNow->format('m');
        // $week = [
        //     1 => 7,
        //     8 => 14,
        //     15 => 21,
        //     22 => 28,
        //     29 => 31
        // ];
        // $stepProgress = ['Waiting', 'On Progress', 'Seal Kit', 'Trial', 'Finish', 'Scrap'];
        // $asu = [
        //     'x : Design', 'On Progress', 'Seal Kit', 'Trial', 'Finish', 'Scrap'
        // ];

        // $dataRepairAll = DB::table('waitingrepairs')
        //     ->whereMonth('date', '=', Carbon::now()->format('m'))
        //     ->whereYear('date', '=', Carbon::now()->format('Y'))
        //     ->get();

        // foreach ($stepProgress as $step) {
        //     $counting[$step] = 0;
        //     $w = 1;
        //     foreach ($week as $start => $finish) {
        //         $qty[$step]['W' . $w] = DB::table('waitingrepairs')
        //             ->whereMonth('date', '=', $dateNowMonth)
        //             ->whereYear('date', '=', $dateNowYear)
        //             ->where('progress', $step)
        //             ->whereBetween('date', [Carbon::parse($dateNowYear . '-' . $dateNowMonth . '-' . $start)->format('Y-m-d'), Carbon::parse($dateNowYear . '-' . $dateNowMonth . '-' . $finish)->format('Y-m-d')])
        //             ->count();

        //         $qty['total']['W' . $w] = DB::table('waitingrepairs')
        //             ->whereMonth('date', '=', $dateNowMonth)
        //             ->whereYear('date', '=', $dateNowYear)
        //             ->whereBetween('date', [Carbon::parse($dateNowYear . '-' . $dateNowMonth . '-' . $start)->format('Y-m-d'), Carbon::parse($dateNowYear . '-' . $dateNowMonth . '-' . $finish)->format('Y-m-d')])
        //             ->count();

        //         $counting[$step] = $counting[$step] + $qty[$step]['W' . $w];
        //         $w++;
        //     }
        // }

        // $counting['total'] = 0;
        // foreach ($qty['total'] as $index => $item) {
        //     $counting['total'] = $counting['total'] + $item;
        // }

        return view('partrepair/ganttchart', [
            'date' => Carbon::now()->format('Y-m'),
            'count' => $count,
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
}
