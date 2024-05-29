<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\VideoRequest;
use App\Models\Video;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    public function index(Request $request)
    {
        if($request->input('search'))
        {
            $request->input('search');
            $query_request = $request->input('search');
            $query_parameter = $request->query('search');
            $video_query = Video::query()->where('title','LIKE','%' . self::escape($query_request) . '%')->get();
            // dd($video_query);
            return view('/video/index',compact('video_query','query_parameter'));
        }
        $videos = Video::select('id','title','path','overview')->get();
        return view('/video/index',compact('videos'));
    }

    public static function escape($str)
    {
        return str_replace(['\\', '%', '_'], ['\\\\', '\%', '\_'], $str);
    }

    public function create()
    {
        return view('/video/create');
    }

    public function store(VideoRequest $request)
    {
        // storage/app/public/imagesにパスを保存
        $path = $request->file('video')->storeAs('images','youtube','public');

        $session_put = $request->session()->put('uploaded_file',$path);
        $session = session()->get($session_put);
        $videos = new Video();
        $videos->title = $request->title;
        $videos->path = $path;
        $videos->overview = $request->overview;
        $videos->user_id = Auth::id();
        // dd($session);
        $videos->save();

        return redirect()->route('video.index');
    }

    public function show(string $id)
    {
        $video = Video::find($id);
        return view('/video/show',compact('video'));
    }

    public function edit(string $id)
    {
        $video = Video::find($id);
        return view('/video/edit',compact('video'));
    }

    public function update(VideoRequest $request , string $id)
    {
        $path=$request->file('video')->storeAs('images','youtube','public');

        $video = Video::find($id);
        $video->title = $request->title;
        $video->path = $path;
        $video->overview = $request->overview;
        $video->user_id = Auth::id();
        // dd($request->video,$path);
        $video->save();
        return redirect()->route('video.index');
    }
    public function delete(string $id)
    {
        $video = Video::find($id);
        $video->delete();
        return redirect()->route('video.index');
    }

}
