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
        $data = [
            'form_input_id' => $request->form_input_id,
            'progressrepair_id' => $request->progressrepair_id,
            'f_reg_sp' => $request->f_reg_sp,
            'f_date' => Carbon::parse($request->f_date)->format('Y-m-d H:i:s'),
            'f_item_name' => $request->f_item_name,
            'f_item_type' => $request->f_item_type,
            'f_maker' => $request->f_maker,
            'f_price' => intval(preg_replace('/[^\d.]/', '', $request->f_price)),
            'f_nama_pic' => $request->f_nama_pic,
            'f_place_of_repair' => $request->f_place_of_repair,
            'f_analisa' => $request->f_analisa,
            'f_action' => $request->f_action,
            'f_subcont_cost' => intval(preg_replace('/[^\d.]/', '', $request->f_subcont_cost)),
            'f_labour_cost' => intval(preg_replace('/[^\d.]/', '', $request->f_labour_cost)),
            'f_seal_kit_cost' => intval(preg_replace('/[^\d.]/', '', $request->f_seal_kit_cost)),
            'f_total_cost_repair' => intval(preg_replace('/[^\d.]/', '', $request->f_total_cost_repair)),
            'f_total_cost_saving' => intval(preg_replace('/[^\d.]/', '', $request->f_total_cost_saving)),
            'code_part_repair' => $request->code_part_repair,
            'delivery_date' => Carbon::parse($request->delivery_date)->format('Y-m-d H:i:s'),
            'pic_delivery' => $request->pic_delivery,
        ];
        // validated input request
        // $this->validate($request, [
        //     'form_input_id' => 'required',
        // ]);

        // create new task
        // Finishrepair::create($request->all());
        // $data = $request->all();
        // $data['delivery_date'] = Carbon::parse($request->delivery_date)->format('Y-m-d H:i:s');
        $finish = Finishrepair::where('form_input_id', $request->form_input_id)->first();
        if ($finish == null) {
            Finishrepair::create($data);
        } else {
            Finishrepair::find($finish->id)->update($data);
        }
        
        $request2 = Waitingrepair::find($request->form_input_id);
        $request2->progress = 'Finish';
        $request2->save();
        // return redirect()->route('partrepair.waitingtable.index')->with('success', 'Your task added successfully!');
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
