<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function __construct()
    {
    }

    public function index(Request $request)
    {
        $sortBy = $request->input('sortBy') ?? 'news.id';
        $sortOrder = $request->input('sortOrder') ?? 'desc';
        $users_id = Auth::id();
        $news = News::select('*')
        ->leftJoin('users', 'users.id','=','news.users_id')
        ->where('news.users_id',$users_id)
        ->orderBy($sortBy, $sortOrder)
        ->get();
        return response()->json($news);
    }

    public function createNews(Request $request)
    {
        $statusId = $request->input('statusId');
        $time_public = $request->input('time_public');
        $title = $request->input('title');
        $typeId = $request->input('typeId');
        $big_headlines = $request->input('big_headlines');
        $subheadings = $request->input('subheadings');
        $main_text = $request->input('main_text');
        $block_image = $request->input('block_image');
        $block_youtube = $request->input('block_youtube');
        $list_block = $request->input('list_block');
        $users_id = Auth::id();

        if(isset($statusId) && isset($time_public) && isset($title)
            && isset($typeId) && isset($big_headlines) && isset($subheadings) && isset($main_text)
            && isset($block_image) && isset($block_youtube) && isset($list_block))
        {
            $result = DB::table('news')->insert([
                'statusId' => $statusId,
                'time_public' => $time_public,
                'title' => $title,
                'typeId' => $typeId,
                'big_headlines' => $big_headlines,
                'subheadings' => $subheadings,
                'main_text' => $main_text,
                'block_image' => $block_image,
                'block_youtube' => $block_youtube,
                'list_block' => $list_block,
                'users_id' => $users_id,
            ]);
            if($result) {
                return response()->json('Success', 200);
            } else {
                return response()->json('Create news fails', 500);
            }
        } else {
            return response()->json('Invalid data format', 400);
        }
    }

    public function findById($id)
    {
        $findId = News::where('users_id', Auth::id())->find($id);
        if($findId) {
            return response()->json($findId);
        } else {
            return response()->json('News not found', 404);
        }
    }

    public function updateNews($id, Request $request)
    {
        $update = News::where('users_id', Auth::id())->find($id);

        if(!$update) {
            return response()->json('News not found', 404);
        }
        $update->statusId = $request->get('statusId');
        $update->time_public = $request->get('time_public');
        $update->title = $request->get('title');
        $update->typeId = $request->get('typeId');
        $update->big_headlines = $request->get('big_headlines');
        $update->subheadings = $request->get('subheadings');
        $update->main_text = $request->get('main_text');
        $update->block_image = $request->get('block_image');
        $update->block_youtube = $request->get('block_youtube');
        $update->list_block = $request->get('list_block');

        $update->save();
        return response()->json('Update News success!');
    }
}
