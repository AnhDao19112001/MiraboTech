<?php

namespace App\Http\Controllers;

use App\Models\Status;

class StatusController extends Controller
{
    public function __construct()
    {
    }

    public function indexStatus()
    {
        $type = Status::all();
        return response()->json($type);
    }
}
