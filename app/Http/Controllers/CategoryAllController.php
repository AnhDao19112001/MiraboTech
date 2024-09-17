<?php

namespace App\Http\Controllers;

use App\Models\CategoryAll;
use Illuminate\Http\Request;

class CategoryAllController extends Controller
{
    public function __construct()
    {
    }

    public function indexCategory()
    {
        $type = CategoryAll::all();
        return response()->json($type);
    }

    public function findId($id)
    {
        $findById = CategoryAll::select('category.*')
            ->leftJoin('descriptionCategory', 'descriptionCategory.id', '=', 'category.descriptionCategoryId')
            ->where('category.id', '=', $id)
            ->get();
            if(!$findById) {
                return response()->json('Description Category not found!', 404);
            }
            return response()->json($findById);
    }

    public function updateCategory(Request $request, $id)
    {
        $update = CategoryAll::find($id);

        if(!$update) {
            return response()->json('Category not found!', 404);
        }

        $update->nameCategory = $request->get('nameCategory');
        $update->descriptionName = $request->get('descriptionName');
        $update->descriptionCategoryId = $request->get('descriptionCategoryId');

        $update->save();
        return response()->json('Update category successfully!', 200);
    }

    public function deleteCategory($id)
    {
        $update = CategoryAll::find($id);

        if(!$update) {
            return response()->json('Category not found!', 404);
        }

        $update->delete();
        return response()->json('Delete Category success!', 200);
    }
}
