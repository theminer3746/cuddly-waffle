<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NodeController extends Controller
{
    public function getData(Request $request, $id)
    {
        $data = (new \App\NodeData())->getDataById($id);
        return response()->json($data, 200);
    }

    public function updateData(Request $request)
    {
        if (!(new \App\NodeData())->where('id', $request->id)->exists()) {
            return response()->json([], 404);
        }

        $updateResult = (new \App\NodeData())
            ->setDataById($request->id, $request->alarm, $request->alarm_stop);

        if ($updateResult) {
            return response()->json([], 200);
        } else {
            return response()->json([], 400);
        }
    }
}
