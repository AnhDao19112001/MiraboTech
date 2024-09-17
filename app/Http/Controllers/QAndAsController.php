<?php

namespace App\Http\Controllers;

use App\Models\QAndAs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QAndAsController extends Controller
{
    public function __construct()
    {
    }

    public function findAll(Request $request)
    {
        $sortBy = $request->input('sortBy') ?? 'qanda.id';
        $sortOrder = $request->input('sortOrder') ?? 'desc';
        $qanda = QAndAs::select('qanda.*')
        ->join('categoryTopic', 'qanda.typeId','=','categoryTopic.id')
        ->orderBy($sortBy, $sortOrder)
        ->get();
        return response()->json($qanda);
    }

    public function createQAndAs(Request $request)
    {
        $question = $request->input('question');
        $answer = $request->input('answer');
        $typeId = $request->input('typeId');

        if(isset($question) && isset($answer) && isset($typeId))
        {
            $result = DB::table('qanda')->insert([
                'question' => $question,
                'answer' => $answer,
                'typeId' => $typeId,
            ]);

            if($result) {
                return response()->json('Create Q and A success!', 200);
            } else {
                return response()->json('Create Q and A fails', 500);
            }
        } else {
            return response()->json('Invalid data format', 400);
        }
    }

    public function findById($id)
    {
        $findId = QAndAs::find($id);

        if(!$findId) {
            return response()->json('Q and A not found!', 404);
        }
        return response()->json($findId);
    }

    public function updateQAndA(Request $request, $id)
    {
        $update = QAndAs::find($id);

        if(!$update) {
            return response()->json('Q and A not found!', 404);
        }

        $update->question = $request->get('question');
        $update->answer = $request->get('answer');
        $update->typeId = $request->get('typeId');

        $update->save();
        return response()->json('Update Q and A success!', 200);
    }
}
