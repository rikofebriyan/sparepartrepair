<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use App\StandardPengecekan;
use App\User;
use App\Maker;
use App\Subcont;
use App\Line;
use App\Section;
use App\Waitingrepair;
use App\Progressrepair;
use App\Progresspemakaian;
use App\MasterSparePart;
use App\Progresstrial;
use App\Finishrepair;
use Illuminate\Http\Request;

use App\Http\Requests;

class FinishrepairController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partr = Finishrepair::all()->sortByDesc('id');
        return view('partrepair.finishrepairtable', [
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
            'form_input_id' => 'required',
        ]);

        // create new task
        // Finishrepair::create($request->all());
        $data = $request->all();
        $data['delivery_date'] = Carbon::parse($request->delivery_date)->format('Y-m-d H:i:s');
        Finishrepair::create($data);
        $request2 = Waitingrepair::find($request->form_input_id)->first();
        $request2->progress = 'Finish';
        $request2->save();
        return redirect()->route('partrepair.finishrepair.index')->with('success', 'Your task added successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mastersparepart = MasterSparePart::all();
        $maker = Maker::all();
        $subcont = Subcont::all();
        $user = User::all();
        $progresspemakaian = Progresspemakaian::all();
        $waitingrepair = Waitingrepair::find($id);
        $progressrepair = Progresspemakaian::where('form_input_id', $id)->first();
        // $progressrepair = DB::table('Progressrepairs')->where('form_input_id', 10)->get();
        // dd($progressrepair);
        return view('partrepair.formfinishrepair', [
            'waitingrepair'    => $waitingrepair,
            'progressrepair'    => $progressrepair,
            'user'    => $user,
            'subcont'    => $subcont,
            'maker'    => $maker,
            'mastersparepart'    => $mastersparepart,
            'progresspemakaian'    => $progresspemakaian,
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
        //
    }
}
