<?php

namespace App\Http\Controllers;

use App\Line;
use App\MasterSparePart;
use Illuminate\Http\Request;

use App\Http\Requests;

class InfoController extends Controller
{

    public function index()
    {
        // dd($id);
        $item_name = $_GET['item_name'];
        $data = MasterSparePart::where('id', $item_name)->get();
        // echo json_encode($data);
        $withoutbrackets = trim($data, '[]');
        echo $withoutbrackets;
    }



    public function getInfo($nim)
    {
    $data = MasterSparePart::all()->where('id', $nim);
    return Response::json(['success'=>true, 'data'=>$data]);
    }

    
    public function getline(Request $request)
    {
        $sectionId = $request->get('sectionId');
        $line = Line::all()->where('section_id', $sectionId)->pluck('name', 'id');
        return response()->json($line);
        // echo json_encode($line);
    }
}
