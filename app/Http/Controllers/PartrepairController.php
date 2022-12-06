<?php

namespace App\Http\Controllers;

use App\Line;
use App\Section;
use App\MasterSparePart;
use Illuminate\Http\Request;

use App\Http\Requests;

class PartrepairController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {
        return view('partrepair.index');
    }

    public function request(Request $request)
    {
        $section = Section::all();
        $line = Line::all();
        // $line = Line::all()->where('section_id', $request->get('id'));
        $partr = MasterSparePart::all()->sortByDesc('id');
        return view('partrepair.request', [
            'reqtzy' => $partr,
            'section' => $section,
            'line' => $line
        ]);
    }
}