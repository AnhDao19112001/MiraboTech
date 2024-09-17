<?php

namespace App\Http\Controllers;

use App\Models\Purpose;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurposeController extends Controller
{
    public function __construct()
    {
    }

    public function indexStatus()
    {
        $type = Purpose::all();
        return response()->json($type);
    }

    public function createPurpose(Request $request)
    {
        $purposeName = $request->input('purposeName');
        $explanationOfPurpose = $request->input('explanationOfPurpose');

        if(isset($purposeName) && isset($explanationOfPurpose)){
            $result = DB::table('purpose')->insert([
                'purposeName' => $purposeName,
                'explanationOfPurpose' => $explanationOfPurpose
            ]);

            if($result) {
                return response()->json('Create purpose success!', 200);
            } else {
                return response()->json('Create purpose fails', 500);
            }
        } else {
            return response()->json('Invalid data format', 400);
        }
    }

    public function findById($id)
    {
        $findId = Purpose::find($id);

        if(!$findId) {
            return response()->json('Purpose not found!', 404);
        }
        return response()->json($findId);
    }

    public function updatePurpose(Request $request, $id)
    {
        $update = Purpose::find($id);

        if(!$update) {
            return response()->json('Purpose not found!', 404);
        }
        $update->purposeName = $request->get('purposeName');
        $update->explanationOfPurpose = $request->get('explanationOfPurpose');

        $update->save();
        return response()->json('Update purpose update success!', 200);
    }
}
