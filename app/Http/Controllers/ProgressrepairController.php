<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\Maker;
use App\Subcont;
use App\Line;
use App\Section;
use App\Waitingrepair;
use App\Progressrepair;
use App\Progresspemakaian;
use App\MasterSparePart;
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

        // dd($data);
        // validated input request
        $this->validate($request, [
            'pic_repair' => 'required',
        ]);

        // Progressrepair::create($request->all());

        $data = $request->all();
        $data['plan_start_repair'] = Carbon::parse($request->plan_start_repair)->format('Y-m-d H:i:s');
        $data['plan_finish_repair'] = Carbon::parse($request->plan_finish_repair)->format('Y-m-d H:i:s');
        $data['actual_start_repair'] = Carbon::parse($request->actual_start_repair)->format('Y-m-d H:i:s');
        $data['actual_finish_repair'] = Carbon::parse($request->actual_finish_repair)->format('Y-m-d H:i:s');
        $data['estimasi_selesai'] = Carbon::parse($request->estimasi_selesai)->format('Y-m-d H:i:s');
        Progressrepair::create($data);

        $request2 = Waitingrepair::find($request->form_input_id);
        $request2->progress = 'On Progress';
        $request2->save();
        
        // dd($request2);


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
        $ready = Progresspemakaian::where('status_part','=', 'Ready')
        ->where('form_input_id', $id)
        ->count();
        $countid = Progresspemakaian::where('form_input_id', $id)->count();
        $mastersparepart = MasterSparePart::all();
        $maker = Maker::all();
        $subcont = Subcont::all();
        $user = User::all();
        // $progresspemakaian = Progresspemakaian::all(); // original riko febriyan omov
        $progresspemakaian = Progresspemakaian::where('form_input_id', $id)->get();
        $waitingrepair = Waitingrepair::find($id);
        $progressrepair = Progressrepair::where('form_input_id', $id)->first();
        // $progressrepair = DB::table('Progressrepairs')->where('form_input_id', 10)->get();
        // dd($progressrepair);
        return view('partrepair.progresspemakaian', [
            'waitingrepair'    => $waitingrepair,
            'progressrepair'    => $progressrepair,
            'user'    => $user,
            'subcont'    => $subcont,
            'maker'    => $maker,
            'mastersparepart'    => $mastersparepart,
            'progresspemakaian'    => $progresspemakaian,
            'ready'    => $ready,
            'countid'    => $countid,
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
