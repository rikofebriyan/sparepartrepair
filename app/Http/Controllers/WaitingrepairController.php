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
        Waitingrepair::create($data);
        return redirect()->route('partrepair.waitingtable.index')->with('success', 'Your task added successfully!');
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

        // form 3
        $progresspemakaian = Progresspemakaian::where('form_input_id', $id)->get();
        $countid = Progresspemakaian::where('form_input_id', $id)->count();
        $mastersparepart = MasterSparePart::all();
        $maker = Maker::all();
        $ready = Progresspemakaian::where('status_part', '=', 'Ready')
            ->where('form_input_id', $id)
            ->count();
        $countid = Progresspemakaian::where('form_input_id', $id)->count();

        // form 4
        $join = StandardPengecekan::join('item_standards', 'standard_pengecekans.item_standard_id', '=', 'item_standards.id')
            ->select('standard_pengecekans.*', 'item_standards.item_standard')
            ->where('standard_pengecekans.master_spare_part_id', $waitingrepair->item_id)
            ->get();
        $itemstandard = ItemStandard::all();

        // form 5
        $progressrepair = $progresspemakaian->first();

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
