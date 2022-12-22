<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;

use App\ItemStandard;
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
        // $asu = Waitingrepair::where('id', $request->form_input_id)->first();
        // $join = StandardPengecekan::join('item_standards', 'standard_pengecekans.item_pengecekan_id', '=', 'item_standards.id')
        //     ->select('standard_pengecekans.*', 'item_standards.item_standard')
        //     ->where('standard_pengecekans.master_spare_part_id', $asu->item_id)
        //     ->get();
        // $actual = Progresstrial::where('form_input_id', $asu->id)->count();
        // if ($actual > 0) {
        //     $join = StandardPengecekan::join('item_standards', 'standard_pengecekans.item_pengecekan_id', '=', 'item_standards.id')
        //         ->join('progresstrials', 'progresstrials.standard_pengecekan_id', '=', 'standard_pengecekans.id')
        //         ->select('standard_pengecekans.*', 'item_standards.item_standard', 'progresstrials.*')
        //         ->where('standard_pengecekans.master_spare_part_id', $asu->item_id)
        //         ->get();
        // } else {
        //     $join = StandardPengecekan::join('item_standards', 'standard_pengecekans.item_pengecekan_id', '=', 'item_standards.id')
        //         ->select('standard_pengecekans.*', 'item_standards.item_standard')
        //         ->where('standard_pengecekans.master_spare_part_id', $asu->item_id)
        //         ->get();
        // }
        $join = Progresstrial::where('form_input_id', $request->form_input_id)
            ->join('item_standards', 'item_standards.id', '=', 'progresstrials.item_check_id')
            ->select('progresstrials.*', 'item_standards.item_standard')
            ->get();

        // $trial = Progresstrial::where('form_input_id', $request->form_input_id)->get();
        // if ($trial != null) {
        //     foreach ($trial as $tr) {
        //         Progresstrial::find($tr->id)->delete();
        //     }
        // }

        foreach ($join as $joi) {
            $data['form_input_id'] = $request->data[$joi->id]['form_input_id'];
            $data['item_check_id'] = $request->data[$joi->id]['item_check_id'];
            $data['operation'] = $request->data[$joi->id]['operation'];
            $data['standard_pengecekan_min'] = $request->data[$joi->id]['standard_pengecekan_min'];
            $data['standard_pengecekan_max'] = $request->data[$joi->id]['standard_pengecekan_max'];
            $data['unit_measurement'] = $request->data[$joi->id]['unit_measurement'];
            $data['actual_pengecekan'] = $request->data[$joi->id]['actual_pengecekan'];
            $data['judgement'] = $request->data[$joi->id]['judgement'];
            $data['standard_pengecekan_id'] = $request->data[$joi->id]['standard_pengecekan_id'];

            Progresstrial::find($request->data[$joi->id]['id'])->update($data);
        }
        // $ok = 'OK';
        // $request->request->add(['value' => $ok]);
        // $this->validate($request, [
        //     'judgement' => 'required|min:2',
        // ]);

        // $actual_pengecekan = $request->actual_pengecekan;
        // $judgement = $request->judgement;

        // foreach ($request['actual_pengecekan'] as $key => $val) {
        //     Progresstrial::create([
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //         'form_input_id' => $request['form_input_id'][$key],
        //         'id_standard_pengecekan' => $request['id_standard_pengecekan'][$key],
        //         'standard_pengecekan' => $request['standard_pengecekan'][$key],
        //         'actual_pengecekan' => $request['actual_pengecekan'][$key],
        //         'judgement' => $request['judgement'][$key],
        //     ]);
        // }

        // $request = array();
        // foreach ($_POST['actual_pengecekan'] as $key => $val) {
        //     $request[] = array(
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //         'form_input_id' => $_POST['form_input_id'][$key],
        //         'id_standard_pengecekan' => $_POST['id_standard_pengecekan'][$key],
        //         'standard_pengecekan' => $_POST['standard_pengecekan'][$key],
        //         'actual_pengecekan' => $_POST['actual_pengecekan'][$key],
        //         'judgement' => $_POST['judgement'][$key]
        //     );
        // }
        // Progresstrial::insert($request);

        // dd($request);

        $request2 = Waitingrepair::find($request->form_input_id);
        $request2->progress = 'Trial';
        $request2->save();
        // Waitingrepair::update($request2);
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

        $asu = Waitingrepair::where('id', $id)->first();
        // dd($asu->item_id);
        $join = StandardPengecekan::join('item_standards', 'standard_pengecekans.item_pengecekan_id', '=', 'item_standards.id')
            ->select('standard_pengecekans.*', 'item_standards.item_standard')
            ->where('standard_pengecekans.master_spare_part_id', $asu->item_id)
            ->get();
        // dd($join);

        $itemstandard = ItemStandard::all();
        // dd($itemstandard);
        $mastersparepart = MasterSparePart::all();
        $maker = Maker::all();
        $subcont = Subcont::all();
        $user = User::all();
        $progresspemakaian = Progresspemakaian::all();
        $waitingrepair = Waitingrepair::find($id);
        $progressrepair = Progresspemakaian::where('form_input_id', $id)->first();
        // dd($progressrepair);
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
            'itemstandard'    => $itemstandard,
            'asu'    => $asu,
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
        $this->validate($request, [
            'standard_pengecekan' => 'required',
        ]);
        StandardPengecekan::find($id)->update($request->all());
        return redirect()->back()->with('success', 'StandardPengecekan updated successfully');
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
        return redirect()->route('partrepair.progresstrial.index')->with('success', 'Task removed successfully');
    }
}
