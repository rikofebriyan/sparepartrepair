<?php

namespace App\Http\Controllers;

use DB;
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
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class ProgresstrialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partr = Progresstrial::all()->sortByDesc('id');
        return view('partrepair.progresstrialtable', [
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
        // $this->validate($request, [
        //     'actual_pengecekan' => 'required',
        // ]);
        // $request = [
        //     ['actual_pengecekan'=>'Coder 1', 'judgement'=> '4096'],
        //     ['actual_pengecekan'=>'Coder 2', 'judgement'=> '2048'],
        //     //...
        // ];
        // dd($request);
        $actual_pengecekan = $request->actual_pengecekan;
        $judgement= $request->judgement;

    
        $result = array();
        foreach ($_POST['actual_pengecekan'] as $key => $val) {
            $result[] = array(
                'actual_pengecekan' => $_POST['actual_pengecekan'][$key],
                'judgement' => $_POST['judgement'][$key]
            );
        }
            // dd($result);

        // Progresstrial::create($request);

    
        Progresstrial::insert($result);
        // DB::table('Progresstrials')->insert($data);
        // create new task
        // Progresstrial::create($request->all());
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

        $join = StandardPengecekan::join('item_standards', 'standard_pengecekans.item_standard_id', '=', 'item_standards.id')
            ->select('standard_pengecekans.*', 'item_standards.item_standard')
            ->get();
            // dd($join);

        $mastersparepart = MasterSparePart::all();
        $maker = Maker::all();
        $subcont = Subcont::all();
        $user = User::all();
        $progresspemakaian = Progresspemakaian::all();
        $waitingrepair = Waitingrepair::find($id);
        $progressrepair = Progresspemakaian::where('form_input_id', $id)->first();
        // $progressrepair = DB::table('Progressrepairs')->where('form_input_id', 10)->get();
        // dd($progressrepair);
        return view('partrepair.progresstrial', [
            'waitingrepair'    => $waitingrepair,
            'progressrepair'    => $progressrepair,
            'user'    => $user,
            'subcont'    => $subcont,
            'maker'    => $maker,
            'mastersparepart'    => $mastersparepart,
            'progresspemakaian'    => $progresspemakaian,
            'join'    => $join,
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
        Progresstrial::find($id)->delete();
        return redirect()->route('partrepair.progresstrial.index')->with('success','Task removed successfully');
    }
}
