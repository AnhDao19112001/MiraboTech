<?php

namespace App\Http\Controllers;

use App\Models\Schools;
use Illuminate\Http\Request;

class SchoolsController extends Controller
{
    public function __construct()
    {
    }

    public function storeList(Request $request) {
        $findById = $request->input('findById');
        $findByName = $request->input('findByName');
        $findProvinceCity = $request->input('findProvinceCity');
        $findLocalLevels = $request->input('findLocalLevels');
        $sortBy = $request->input('sortBy') ?? 'school.id';
        $sortOrder = $request->input('sortOrder') ?? 'desc';
        $schools = Schools::select('*')
        ->where('school.id', 'like','%'. $findById .'%')
        ->where('school.nameSchool','like','%'. $findByName .'%')
        ->where('school.provinceCity','like','%'. $findProvinceCity .'%')
        ->where('school.localLevels','like','%'. $findLocalLevels .'%')
        ->orderBy($sortBy, $sortOrder)
        ->get();
        return response()->json($schools);
    }

    public function findById($id) {
        $findById = Schools::select([
        'id',
        'nameSchool',
        'postalCode',
        'provinceCity',
        'access',
        'businessHours',
        'phone'])
        ->where('id', '=', $id)
        ->get();
        if($findById->isEmpty()) {
            return response()->json('Find by id not found!',404);
        }
        return response()->json($findById);
    }

    public function updateSchool(Request $request, $id)
    {
        $update = Schools::find($id);

        if(!$update) {
            return response()->json('School not found!', 404);
        }

        $update->nameSchool = $request->get('nameSchool');
        $update->imageLogo = $request->get('imageLogo');
        $update->imageSchool = $request->get('imageSchool');
        $update->messageSchool = $request->get('messageSchool');
        $update->postalCode = $request->get('postalCode');
        $update->provinceCity = $request->get('provinceCity');
        $update->localLevels = $request->get('localLevels');
        $update->access = $request->get('access');
        $update->businessHours = $request->get('businessHours');
        $update->phone = $request->get('phone');

        $update->save();
        session()->flash('success', 'School updated successfully');
        return response()->json('Update school success!');
    }
}
