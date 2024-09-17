<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Schools;
use Illuminate\Http\Request;

class CourserController extends Controller
{
    public function __construct()
    {
    }

    public function getById($schoolId,$id)
    {
        $school = Schools::find($schoolId);

        if(!$school) {
            return response()->json('School not found!', 404);
        }

        $findById = Course::select('courser.*')
                    ->leftJoin('school', 'school.id', '=', 'courser.schoolId')
                    ->leftJoin('leturer', 'leturer.id', '=', 'courser.lecturerId')
                    ->leftJoin('category', 'category.id', '=', 'courser.categoryId')
                    ->where('courser.id', '=', $id)
                    ->where('courser.schoolId', '=', $school)
                    ->get();

        if(!$findById) {
            return response()->json('Courser not found!', 404);
        }
        return response()->json($findById);
    }

    public function searchCourses(Request $request)
    {
        $findByName = $request->input('findByName');
        $findByCategory = $request->input('categoryId');
        $sortBy = $request->input('sortBy') ?? 'courser.id';
        $sortOrder = $request->input('sortOrder') ?? 'desc';

        $courser = Course::select('courser.courseName','school.nameSchool')
            ->leftJoin('school', 'school.id', '=', 'courser.schoolId')
            ->leftJoin('leturer', 'leturer.id', '=', 'courser.lecturerId')
            ->leftJoin('category', 'category.id', '=', 'courser.categoryId')
            ->where('courser.courseName', 'like','%'. $findByName .'%')
            ->where('courser.categoryId', '=', $findByCategory)
            ->orderBy($sortBy, $sortOrder)
            ->get();
        return response()->json($courser);
    }
}
