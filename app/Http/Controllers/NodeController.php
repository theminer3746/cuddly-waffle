<?php

namespace App\Http\Controllers;

use App\NodeData;
use Illuminate\Http\Request;

class NodeController extends Controller
{
    private $nodeData;

    public function __consturct()
    {
        $this->nodeData = new NodeData();
    }

    public function getData(Request $request, $id)
    {
        $data = $this->nodeData->getDataById($id);
        return response()->json($data, 200);
    }

    public function updateData(Request $request)
    {
        if (!$this->nodeData->where('id', $request->id)->exists()) {
            return response()->json([], 404);
        }

        $updateResult = $this->nodeData
            ->setDataById($request->id, $request->alarm, $request->letAlarm, $request->alarmStop);

        if ($updateResult) {
            return response()->json([], 200);
        } else {
            return response()->json([], 400);
        }
    }
}
