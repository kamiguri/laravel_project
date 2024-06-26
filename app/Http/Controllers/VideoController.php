<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\VideoRequest;
use App\Models\Subscribe;
use App\Models\Video;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    public function index(Request $request)
    {
        if($request->input('search'))
        {
            $request->input('search');
            $query_request = $request->input('search');
            $video_query = Video::select('id','title','path','overview','user_id')->where('title','LIKE','%' . self::escape($query_request) . '%')->get();

            return view('/video/index',compact('video_query'));
        }
        $videos = Video::with('user')->get();

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
        $path = $request->file('video')->store('images','public');
        $filesize = $request->file("video")->getSize();
        $videos = new Video();
        $videos->title = $request->title;
        $videos->path = $path;
        $videos->overview = $request->overview;
        $videos->user_id = Auth::id();
        $videos->save();

        return redirect()->route('video.index');
    }

    public function show(string $id)
    {
        $video = Video::find($id);
        $subscribers = Subscribe::where('subscribed_id',$video->user_id)->count();

        $is_subscribed = false;
        if (Auth::check()) {
            $is_subscribed = Subscribe::where('subscribed_id',$video->user_id)
                ->where('subscribing_id', Auth::id())
                ->exists();
        }

        return view('/video/show',compact('video','subscribers', 'is_subscribed'));
    }

    public function edit(string $id)
    {
        $video = Video::find($id);
        return view('/video/edit',compact('video'));
    }

    public function update(VideoRequest $request , string $id)
    {
        $path=$request->file('video')->store('images','public');

        $video = Video::find($id);
        $video->title = $request->title;
        $video->path = $path;
        $video->overview = $request->overview;
        $video->user_id = Auth::id();
        // dd($request->video,$path);
        $video->save();
        return redirect()->route('profile.post');
    }
    public function delete(string $id)
    {
        $video = Video::find($id);
        $video->delete();
        return redirect()->route('profile.post');
    }

    public function myPost()
    {
        $videos = Video::all();
        // dd($video);
        return view('/profile/post',compact('videos'));
    }

}
