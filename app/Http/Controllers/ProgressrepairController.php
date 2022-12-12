<?php

namespace App\Http\Controllers;

use App\Progressrepair;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests;

class ProgressrepairController extends Controller
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
        $partr = Progressrepair::all()->sortByDesc('id');
        return view('partrepair.progresstable', [
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

        // dd($request);
        // validated input request
        $this->validate($request, [
            'pic_repair' => 'required',
        ]);

        // create new task
        // Progressrepair::create($request->all());

        $data = $request->all();
        $data['plan_start_repair'] = Carbon::parse($request->plan_start_repair)->format('Y-m-d H:i:s');
        $data['plan_finish_repair'] = Carbon::parse($request->plan_finish_repair)->format('Y-m-d H:i:s');
        $data['actual_start_repair'] = Carbon::parse($request->actual_start_repair)->format('Y-m-d H:i:s');
        $data['actual_finish_repair'] = Carbon::parse($request->actual_finish_repair)->format('Y-m-d H:i:s');
        $data['estimasi_selesai'] = Carbon::parse($request->estimasi_selesai)->format('Y-m-d H:i:s');
        Progressrepair::create($data);
        return redirect()->route('partrepair.progresstable.index')->with('success', 'Your task added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $partrepair = Progressrepair::find($id);
        return view('partrepair.progresspemakaian', [
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
        
        Progressrepair::find($id)->delete();
        return redirect()->route('partrepair.progresstable.index')->with('success','Task removed successfully');
    }
}
