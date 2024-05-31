<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subscribe;
use Illuminate\Support\Facades\Auth;

class SubscribeController extends Controller
{
    public function store($id)
    {
        $users = User::find($id);
        // dd($users);
        $subscribed = Subscribe::where('subscribing_id',Auth::id())->where('subscribed_id',$users->id)->count();
        // dd($subscribed);
        if($subscribed == 0){
            $users->subscribings()->attach(Auth::id());
            return back();
        }elseif($subscribed != 0){
            $users->subscribings()->detach(Auth::id());
            return back();
        }

    }


}
