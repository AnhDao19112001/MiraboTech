<?php

namespace App\Http\Controllers;

use App\Models\DescriptionCategory;

class DescriptionController extends Controller
{
    public function __construct()
    {
    }

    public function findById($id)
    {
        $findById = DescriptionCategory::select('descriptionCategory.*')
            ->leftJoin('category','category.id', '=', 'descriptionCategory.categoryId')
            ->where('descriptionCategory.id', '=', $id)
            ->get();

            if(!$findById) {
                return response()->json('Description Category not found!', 404);
            }
            return response()->json($findById);
    }

    public function selectAll(){
        $type = DescriptionCategory::all();
        return response()->json($type);
    }
}
