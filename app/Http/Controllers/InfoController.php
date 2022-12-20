<?php

namespace App\Http\Controllers;

use App\Finishrepair;
use App\User;
use App\Machine;
use App\Line;
use App\Waitingrepair;
use App\MasterSparePart;
use Illuminate\Http\Request;

use App\Http\Requests;

class InfoController extends Controller
{

    public function index()
    {
        $item_name = $_GET['item_name'];
        $data = MasterSparePart::where('code_item_description', $item_name)->get();
        $withoutbrackets = trim($data, '[]');
        echo $withoutbrackets;
    }



    public function getInfo($nim)
    {
    $data = MasterSparePart::all()->where('id', $nim);
    // return Response::json(['success'=>true, 'data'=>$data]);
    return Response()->json(['success'=>true, 'data'=>$data]);
    }

    
    public function getline(Request $request)
    {
        $sectionId = $request->get('sectionId');
        $line = Line::all()->where('section_id', $sectionId)->pluck('name', 'id');
        return response()->json($line);
    }

    
    public function getmachine(Request $request)
    {
        $lineId = $request->get('lineId');
        $machine = Machine::all()->where('line_id', $lineId)->pluck('name', 'id');
        return response()->json($machine);
    }

    
    public function getlabour(Request $request)
    {
        $labour_id = $request->get('labour_id');
        $data = User::where('name', $labour_id)->get();
        $withoutbrackets = trim($data, '[]');
        echo $withoutbrackets;
    }
    

    public function getNumberOfRepair(Request $request)
    {
        $finishRepair = Finishrepair::where('code_part_repair', $request->codePartRepair)->count();
        return response()->json($finishRepair);
    }
}
