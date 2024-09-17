<?php

namespace App\Http\Controllers;

use App\Models\Special;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SpecialController extends Controller
{
    public function __construct()
    {
    }

    public function selectAll(Request $request)
    {
        $sortBy = $request->input('sortBy') ?? 'special.id';
        $sortOrder = $request->input('sortOrder') ?? 'desc';

        $special = Special::select('*')
            ->leftJoin('status', 'status.id', '=', 'special.statusId')
            ->leftJoin('purpose', 'purpose.id', '=', 'special.purposeId')
            ->orderBy($sortBy, $sortOrder)
            ->get();
        return response()->json($special);
    }

    public function createSpecial(Request $request)
    {
        $timePublic = $request->input('timePublic');
        $title = $request->input('title');
        $imageMV = $request->input('imageMV');
        $statusId = $request->input('statusId');
        $purposeId = $request->input('purposeId');

        if(isset($timePublic) && isset($title) && isset($imageMV) && isset($statusId) && isset($purposeId))
        {
            $result = DB::table('special')->insert([
                'timePublic' => $timePublic,
                'title' => $title,
                'imageMV' => $imageMV,
                'statusId' => $statusId,
                'purposeId' => $purposeId
            ]);
            if(!$result) {
                return response()->json('Create special fails!', 500);
            } else {
                return response()->json('Create special success!', 200);
            }
        } else {
            return response()->json('Invalid data format', 400);
        }
    }

    public function findById($id)
    {
        $findId = Special::find($id);

        if(!$findId) {
            return response()->json('Special not found!', 404);
        }
        return response()->json($findId);
    }

    public function updateSpecial(Request $request, $id)
    {
        $update = Special::find($id);

        if(!$update) {
            return response()->json('Special not found!', 404);
        }

        $update->timePublic = $request->get('timePublic');
        $update->title = $request->get('title');
        $update->imageMV = $request->get('imageMV');
        $update->statusId = $request->get('statusId');
        $update->purposeId = $request->get('purposeId');

        $update->save();
        return response()->json('Update Special success', 200);
    }
}
