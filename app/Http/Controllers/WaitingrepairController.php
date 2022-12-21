<?php

namespace App\Http\Controllers;

use App\User;
use App\Subcont;
use App\Line;
use App\Section;
use App\Waitingrepair;
use Illuminate\Http\Request;
use App\Progresspemakaian;
use App\MasterSparePart;
use App\Maker;
use App\StandardPengecekan;
use App\ItemStandard;

use App\Http\Requests;
use App\Machine;
use App\Progressrepair;

class WaitingrepairController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
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
        $partr = Waitingrepair::all()->sortByDesc('id');
        return view('partrepair.waitingtable', [
            'reqtzy' => $partr,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('partrepair.waitingtable.request');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
        // validated input request
        $this->validate($request, [
            'problem' => 'required',
        ]);

        $line = Line::where('id', $request->get('line'))->first();
        $section = Section::where('id', $request->get('section'))->first();
        $data = $request->all();
        $data['section'] = $section->name;
        $data['line'] = $line->name;
        $data['price'] = intval(preg_replace('/[^\d.]/', '', $request->price));

        if ($request->get('id') != null) {
            Waitingrepair::find($request->get('id'))->update($data);
        } else {
            Waitingrepair::create($data);
        }

        // return redirect()->route('partrepair.waitingtable.index')->with('success', 'Your task added successfully!');
        return redirect()->back()->with('success', 'Your task added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // form 2
        $subcont = Subcont::all();
        $user = User::all();
        $waitingrepair = Waitingrepair::find($id);
        $tradeinddisc = 0.3;
        $price = $waitingrepair->price;
        $price = $waitingrepair->price;
        $tradeincost = $tradeinddisc * $price;
        $progressrepair2 = Progressrepair::where('form_input_id', $waitingrepair->id)->first();

        if ($progressrepair2 == null) {
            $progressrepair2 = (object) ([
                'place_of_repair' => '',
                'analisa' => '',
                'action' => '',
                'pic_repair' => '',
                'judgement' => '',
                'plan_start_repair' => '',
                'plan_finish_repair' => '',
                'actual_start_repair' => '',
                'actual_finish_repair' => '',
                'total_time_repair' => '',
                'labour_cost' => '',
                'subcont_name' => '',
                'judgement' => '',
                'quotation' => '',
                'subcont_cost' => '',
                'lead_time' => '',
                'time_period' => '',
                'nomor_pp' => '',
                'nomor_po' => '',
                'plan_start_repair_subcont' => '',
                'plan_finish_repair_subcont' => '',
                'actual_start_repair_subcont' => '',
                'actual_finish_repair_subcont' => '',
            ]);
        }

        // form 3
        $progresspemakaian = Progresspemakaian::where('form_input_id', $waitingrepair->id)->get();
        $countid = Progresspemakaian::where('form_input_id', $waitingrepair->id)->count();
        $mastersparepart = MasterSparePart::all();
        $maker = Maker::all();
        $ready = Progresspemakaian::where('status_part', '=', 'Ready')
            ->where('form_input_id', $waitingrepair->id)
            ->count();
        $countid = Progresspemakaian::where('form_input_id', $waitingrepair->id)->count();

        // form 4
        $join = StandardPengecekan::join('item_standards', 'standard_pengecekans.item_standard_id', '=', 'item_standards.id')
            ->select('standard_pengecekans.*', 'item_standards.item_standard')
            ->where('standard_pengecekans.master_spare_part_id', $waitingrepair->item_id)
            ->get();
        $itemstandard = ItemStandard::all();

        // form 5
        $progressrepair = $progresspemakaian->first();

        // form 1
        $sectionAll = Section::all();
        $section = $sectionAll->where('name', $waitingrepair->section)->first();

        $lineAll = Line::where('section_id', $section->id)->get();
        $line = Line::where('name', $waitingrepair->line)->first();

        $machineAll = Machine::where('line_id', $line->id)->get();
        // $machine = Machine::where('name', $waitingrepair->machine)->first();

        return view('partrepair.progress', [
            'waitingrepair'    => $waitingrepair,
            'user'    => $user,
            'subcont'    => $subcont,
            'tradeincost'    => $tradeincost,

            'progresspemakaian'    => $progresspemakaian,
            'countid'    => $countid,
            'mastersparepart'    => $mastersparepart,
            'maker'    => $maker,
            'ready'    => $ready,
            'countid'    => $countid,

            'asu'    => $waitingrepair,
            'join'    => $join,
            'itemstandard'    => $itemstandard,

            'progressrepair'    => $progressrepair,
            'progressrepair2' => $progressrepair2,

            'section' => $sectionAll,
            'line' => $lineAll,
            'machine' => $machineAll,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Waitingrepair::find($id)->delete();
        return redirect()->route('partrepair.waitingtable.index')->with('success', 'Task removed successfully');
    }
}
