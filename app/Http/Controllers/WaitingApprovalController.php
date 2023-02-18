<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Waitingrepair;

use App\Http\Requests;

class WaitingApprovalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $partr = Waitingrepair::all()->sortByDesc('id');
        $partr = Waitingrepair::leftJoin('progressrepairs', 'progressrepairs.form_input_id', '=', 'waitingrepairs.id')
            ->select('waitingrepairs.*', 'progressrepairs.plan_start_repair', 'progressrepairs.plan_finish_repair')
            ->where('deleted', null)
            ->where('progress', '<>', 'finish')
            ->where('progress', '<>', 'Scrap')
            ->where('approval', null)
            ->get();
        // dd($partr);
        return view('partrepair.waitingapprove', [
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
        //
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
        $data = $request->all();
        $data['approval'] = $request->approval;
        Waitingrepair::find($id)->update($data);


        // $waitingrepair = Waitingrepair::where('id', $id)->first();
        // $data = $request->all();
        // $data['deleted'] = 1;
        // $data['reason'] = $request['reason'];

        // dd($data);
        // Waitingrepair::find($id)->update($data);

        return redirect()->back()->with('success', 'Ticket Approved successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $data = $request->all();
        $data['deleted'] = 1;
        $data['reason'] = "Rejected: " . $request->reason;
        $data['deleted_by'] = $request->deleted_by;
        Waitingrepair::find($id)->update($data);


        // $waitingrepair = Waitingrepair::where('id', $id)->first();
        // $data = $request->all();
        // $data['deleted'] = 1;
        // $data['reason'] = $request['reason'];

        // dd($data);
        // Waitingrepair::find($id)->update($data);

        return redirect()->route('partrepair.waitingtable.index')->with('success', 'Task removed successfully');
    }
}