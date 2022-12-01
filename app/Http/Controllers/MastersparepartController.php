<?php

namespace App\Http\Controllers;

// use App\Line;
use App\MasterSparePart;
use Illuminate\Http\Request;

use App\Http\Requests;

class MastersparepartController extends Controller
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
        // $tabel2 = Line::all();
        $partr = MasterSparePart::all()->sortByDesc('id');
        return view('matrix.master_spare_part', [
            'reqtzy' => $partr,
            // 'tab2' => $tabel2,
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
        MasterSparePart::create($request->all());
        return redirect()->route('matrix.master_spare_part.index')->with('success', 'Your task added successfully!');
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
        MasterSparePart::find($id)->update($request->all());
        return redirect()->route('matrix.master_spare_part.index')->with('success','MasterSparePart updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MasterSparePart::find($id)->delete();
        return redirect()->route('matrix.master_spare_part.index')->with('success','Task removed successfully');
    }
}
