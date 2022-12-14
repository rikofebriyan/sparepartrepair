<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Progresspemakaian;
use Illuminate\Http\Request;

use App\Http\Requests;

class ProgresspemakaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partr = Progresspemakaian::all()->sortByDesc('id');
        return view('partrepair.progresspemakaiantable', [
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
            'item_code' => 'required',
        ]);

        // create new task
        
        $data = $request->all();
        $data['estimasi_kedatangan'] = Carbon::parse($request->estimasi_kedatangan)->format('Y-m-d H:i:s');
        Progresspemakaian::create($data);
        // Progresspemakaian::create($request->all());
        return redirect()->back()->with('success','Task added successfully');
        // return with('success', 'Your task added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $partrepair = Progresspemakaian::find($id);
        return view('partrepair.progresstrial', [
            'modelrepair'    => $partrepair,
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
        Progresspemakaian::find($id)->delete();
        // Alert::success('success','Task removed successfully');
        // return back();
        return redirect()->back()->with('success','Task removed successfully');
    }
}
