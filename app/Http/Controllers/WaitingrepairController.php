<?php

namespace App\Http\Controllers;

use App\User;
use App\Subcont;
use App\Line;
use App\Section;
use App\Waitingrepair;
use Illuminate\Http\Request;

use App\Http\Requests;

class WaitingrepairController extends Controller
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
        $partr = Waitingrepair::all()->sortByDesc('id');
        return view('partrepair.waitingtable', [
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
        return view('partrepair.waitingtable.request');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
        // validated input request
        $this->validate($request, [
            'problem' => 'required',
        ]);
        
        $line = Line::where('id', $request->get('line'))->first();
        $section = Section::where('id', $request->get('section'))->first();
        $data = $request->all();
        $data['section'] = $section->name;
        $data['line'] = $line->name;
        Waitingrepair::create($data);
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

        
        $subcont = Subcont::all();
        $user = User::all();
        $waitingrepair = Waitingrepair::find($id);
        return view('partrepair.progress', [
            'waitingrepair'    => $waitingrepair,
            'user'    => $user,
            'subcont'    => $subcont,
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
        
        Waitingrepair::find($id)->delete();
        return redirect()->route('partrepair.waitingtable.index')->with('success','Task removed successfully');
    }
}
