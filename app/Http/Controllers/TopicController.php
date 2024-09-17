<?php

namespace App\Http\Controllers;

use App\Models\Schools;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TopicController extends Controller
{
    public function __construct()
    {
    }

    public function createTopic(Request $request, $schoolId){
        $timePublic = $request->input('timePublic');
        $title = $request->input('title');
        $big_headlines = $request->input('big_headlines');
        $subheadings = $request->input('subheadings');
        $main_text = $request->input('main_text');
        $statusId = $request->input('statusId');
        $typeId = $request->input('typeId');

        $schoolIds = Schools::find($schoolId);

        if(!$schoolIds) {
            return response()->json('School not found!', 404);
        }

        if(isset($timePublic) && isset($title) && isset($big_headlines)
            && isset($subheadings) && isset($main_text) && isset($statusId)
            && isset($typeId))
            {
                $result = DB::table('topic')->insert([
                    'timePublic' => $timePublic,
                    'title' => $title,
                    'big_headlines' => $big_headlines,
                    'subheadings' => $subheadings,
                    'main_text' => $main_text,
                    'statusId' => $statusId,
                    'typeId' => $typeId,
                    'schoolId' => $schoolIds->id,
                ]);

                if(!$result) {
                    return response()->json('Create topic fails!', 500);
                } else {
                    return response()->json('Create topic success!', 200);
                }
            } else {
                return response()->json('Invalid data format', 400);
            }
    }

    public function updateTopic(Request $request, $schoolId, $id)
    {
        $update = Topic::where('id', $id)
        ->where('schoolId', $schoolId)
        ->first();

        if(!$update) {
            return response()->json('Topic not found!');
        }

        $update->timePublic = $request->get('timePublic');
        $update->title = $request->get('title');
        $update->big_headlines = $request->get('big_headlines');
        $update->subheadings = $request->get('subheadings');
        $update->main_text = $request->get('main_text');
        $update->statusId = $request->get('statusId');
        $update->typeId = $request->get('typeId');

        $update->save();
        return response()->json('Update topic success!');
    }

    public function findById($schoolId, $id)
    {
        $schoolIds = Schools::where('id', $schoolId)->pluck('id');

        $findById = Topic::select('topic.*')
            ->leftJoin('school', 'school.id', '=', 'topic.schoolId')
            ->where('topic.id', '=', $id)
            ->where('topic.schoolId', '=', $schoolIds)
            ->get();

        if(!$findById) {
            return response()->json('Topic not found!', 404);
        }
        return response()->json($findById);
    }
}
