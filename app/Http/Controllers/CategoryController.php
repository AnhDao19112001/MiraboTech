<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
    }

    public function indexCategory()
    {
        $type = Category::all();
        return response()->json($type);
    }
}
