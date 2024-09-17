<?php

namespace App\Http\Controllers;

use App\Models\Schools;
use App\Models\Urgent;
use Illuminate\Http\Request;

class UrgentController extends Controller
{
    public function __construct()
    {
    }

    public function updateUrgent(Request $request, $schoolIds)
    {
        $validatedData = $request->validate([
            'urgentStatus' => 'required|string|max:255',
            'urgentText' => 'required|string',
        ]);

        $school = Schools::find($schoolIds);

    if (!$school) {
        return response()->json('School not found!', 404);
    }

    $urgent = $school->urgent;

    if (!$urgent) {
        $urgent = new Urgent();
        $urgent->schoolId = $schoolIds;
    }

    $urgent->urgentStatus = $validatedData['urgentStatus'];
    $urgent->urgentText = $validatedData['urgentText'];
    $urgent->save();

    return response()->json('Urgent record update success',200);
    }
}
