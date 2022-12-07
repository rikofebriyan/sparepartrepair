<?php

namespace App\Http\Controllers;

use App\Machine;
use App\Line;
use App\Section;
use App\Waitingrepair;
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
        $AWAL = 'RE';
        $tahun     = date ('Y');
        $bulan = date('m');
        $tanggal    = date('d');
        $asd = $post->created_at->month;
        $noUrutAkhir = Waitingrepair::max('reg_sp')->where($asd, '1');
        $no = 1;
        if($noUrutAkhir) {
        echo "No urut surat di database : " . $noUrutAkhir;
        echo "<br>";
        echo "Pake Format : " . $AWAL . $tahun . $bulan . $tanggal . sprintf("%03s", abs($noUrutAkhir + 1)) ;
        }
         else {
        echo "No urut surat di database : 0" ;
        echo "<br>";
        echo "Pake Format : " . $AWAL . $tahun . $bulan . $tanggal . sprintf("%03s", $no) ;
        }





        $machine = Machine::all();
        $section = Section::all();
        $line = Line::all();
        // $line = Line::all()->where('section_id', $request->get('id'));
        $partr = MasterSparePart::all()->sortByDesc('id');
        return view('partrepair.request', [
            'reqtzy' => $partr,
            'section' => $section,
            'line' => $line,
            'machine' => $machine,
        ]);
    }
}