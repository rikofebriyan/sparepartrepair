<?php

namespace App\Http\Controllers;

use App\MasterSparePart;
use App\ItemStandard;
use App\StandardPengecekan;
use Illuminate\Http\Request;

use App\Http\Requests;

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
        $this->validate($request, [
            'standard_pengecekan' => 'required',
        ]);

        // create new task
        StandardPengecekan::create($request->all());
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
