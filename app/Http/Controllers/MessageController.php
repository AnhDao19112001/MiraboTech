<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function __construct()
    {
    }

    public function index(Request $request)
    {
        $sortBy = $request->input('sortBy') ?? 'message.id';
        $sortOrder = $request->input('sortOrder') ?? 'desc';
        $news = Message::select('*')
        ->leftJoin('courser', 'courser.id','=','message.courserId')
        ->orderBy($sortBy, $sortOrder)
        ->get();
        return response()->json($news);
    }
}
