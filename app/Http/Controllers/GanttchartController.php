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
            ->select('waitingrepairs.*', 'progressrepairs.place_of_repair', 'progressrepairs.analisa', 'progressrepairs.action', 'progressrepairs.plan_start_repair', 'progressrepairs.plan_finish_repair', 'progressrepairs.actual_start_repair', 'progressrepairs.actual_finish_repair')
            ->where('progress', '<>', 'finish')
            ->where('progress', '<>', 'Scrap')
            ->get();
        $count = count(collect($join));


        if ($join != null) {
            foreach ($join as $index => $value) {

                $date1 = Carbon::now();
                $date2 = Carbon::parse($value->plan_finish_repair);
                if ($date1->gt($date2)) {
                    $days = $date1->diffInDays($date2) * -1;
                    $fillcolor = '#dc3545';
                } else {
                    $days = $date2->diffInDays($date1);
                    $fillcolor = '';
                }
                // dd($days);
                $data[$index] = [
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
                    'actual_start_repair' => $value->actual_start_repair,
                    'actual_finish_repair' => $value->actual_finish_repair,
                    'plan_start_repair' => $value->plan_start_repair,
                    'plan_finish_repair' => $value->plan_finish_repair,
                    'fillcolor' => $fillcolor,

                ];
            }
        } else {
            return redirect()->back()->with('no_waiting_part', 'No Schedule Waiting Part Repair');
        }


        return view('partrepair/ganttchart', [
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
