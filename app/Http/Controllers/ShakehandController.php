<?php

namespace App\Http\Controllers;

use App\Models\Shakehand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShakehandController extends Controller
{
    public function __construct()
    {
    }

    public function selectAll(Request $request)
    {
        $sortBy = $request->input('sortBy') ?? 'shakehand.id';
        $sortOrder = $request->input('sortOrder') ?? 'desc';

        $shakehand = Shakehand::select('*')
            ->leftJoin('status', 'status.id', '=', 'shakehand.statusId')
            ->leftJoin('purpose', 'purpose.id', '=', 'shakehand.purposeId')
            ->orderBy($sortBy, $sortOrder)
            ->get();
        return response()->json($shakehand);
    }

    public function createShakehand(Request $request)
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
                return response()->json('Create shakehand fails!', 500);
            } else {
                return response()->json('Create shakehand success!', 200);
            }
        } else {
            return response()->json('Invalid data format', 400);
        }
    }

    public function findById($id)
    {
        $findId = Shakehand::find($id);

        if(!$findId) {
            return response()->json('Shakehand not found!', 404);
        }
        return response()->json($findId);
    }

    public function updateShakehand(Request $request, $id)
    {
        $update = Shakehand::find($id);

        if(!$update) {
            return response()->json('Shakehand not found!', 404);
        }

        $update->timePublic = $request->get('timePublic');
        $update->title = $request->get('title');
        $update->imageMV = $request->get('imageMV');
        $update->statusId = $request->get('statusId');
        $update->purposeId = $request->get('purposeId');

        $update->save();
        return response()->json('Update Shakehand success', 200);
    }
}
