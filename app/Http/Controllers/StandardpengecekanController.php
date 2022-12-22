<?php

namespace App\Http\Controllers;

use App\MasterSparePart;
use App\ItemStandard;
use App\StandardPengecekan;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Progresstrial;

class StandardpengecekanController extends Controller
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
        $tabel3 = ItemStandard::all();
        $partr = StandardPengecekan::all()->sortByDesc('id');
        return view('matrix.standard_pengecekan', [
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
        // $this->validate($request, [
        //     'standard_pengecekan' => 'required',
        // ]);
        $data = [
            'master_spare_part_id' => $request->master_spare_part_id,
            'item_pengecekan_id' => $request->item_standard_id,
            'operation' => $request->operation,
            'standard_pengecekan_min' => $request->standard_pengecekan_min,
            'standard_pengecekan_max' => $request->standard_pengecekan_max,
            'unit_measurement' => $request->unit_measurement,
        ];

        // create new task
        StandardPengecekan::create($data);
        Progresstrial::create([
            'form_input_id' => $request->form_input_id,
            'item_check_id' => $request->item_standard_id,
            'operation' => $request->operation,
            'standard_pengecekan_min' => $request->standard_pengecekan_min,
            'standard_pengecekan_max' => $request->standard_pengecekan_max,
            'unit_measurement' => $request->unit_measurement,
        ]);
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
            'standard_pengecekan' => 'required',
        ]);
        StandardPengecekan::find($id)->update($request->all());
        return redirect()->back()->with('success','StandardPengecekan updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        StandardPengecekan::find($id)->delete();
        return redirect()->route('matrix.standard_pengecekan.index')->with('success','Task removed successfully');
    }
}
