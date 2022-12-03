<?php

namespace App\Http\Controllers;

use App\Maker;
use App\MasterSparePart;
use App\RepairKit;
use Illuminate\Http\Request;

use App\Http\Requests;

class RepairkitController extends Controller
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
    public function index()
    {
        $tabel2 = MasterSparePart::all();
        $tabel3 = Maker::all();
        $partr = RepairKit::all()->sortByDesc('id');
        return view('matrix.repairkit', [
            'reqtzy' => $partr,
            'tab2' => $tabel2,
            'tab3' => $tabel3,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'item_name' => 'required',
        ]);

        // create new task
        RepairKit::create($request->all());
        return redirect()->route('matrix.repair_kit.index')->with('success', 'Your task added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        $this->validate($request, [
            'item_name' => 'required',
        ]);
        RepairKit::find($id)->update($request->all());
        return redirect()->route('matrix.repair_kit.index')->with('success','RepairKit updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RepairKit::find($id)->delete();
        return redirect()->route('matrix.repair_kit.index')->with('success','Task removed successfully');
    }
}
