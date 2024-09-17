<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    public function __construct()
    {
    }

    public function findById($id)
    {
        $findId = Lecturer::find($id);

        if(!$findId) {
            return response()->json('Lecturer not found!', 404);
        }
        return response()->json($findId);
    }

    public function updateLeturer(Request $request, $id)
    {
        $update = Lecturer::find($id);

        if(!$update) {
            return response()->json('Lecturer not found!', 404);
        }

        $update->instructorCode = $request->get('instructorCode');
        $update->name = $request->get('name');
        $update->subject = $request->get('subject');
        $update->imageLecturer = $request->get('imageLecturer');

        $update->save();

        return response()->json('Update leturer success!', 200);
    }
}
