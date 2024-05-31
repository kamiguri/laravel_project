<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Community;
use Illuminate\Support\Facades\Auth;

class CommunityController extends Controller
{
    public function index()
    {
        $communities = Community::all();
        $communities = Community::orderBy('created_at', 'desc')->get();
        return view('community.index', compact('communities'));
    }

    public function create(Request $request)
    {
        return view('/community/create');
    }

    public function store(Request $request)
    {
        $communities = new Community();
        $communities->user_id = Auth::id();
        $communities->com_text = $request->com_text;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public', 'images');
            $communities->path = $path;}

        $communities->updated_at = now();

        $communities->save();

        return redirect()->route('community.index');
    }


    public function show()
    {
        $communities = Community::all();
        $communities = Community::orderBy('created_at', 'desc')->get();
        return view('community.show', compact('communities'));
    }

    public function detail($id)
    {
        $community = Community::find($id);
        return view('/community/detail',compact('community'));
    }

    public function edit($id){
        $communities = Community::find($id);
        return view('community.edit', compact('communities'));
    }

    public function update(Request $request, $id)
    {
        $communities = Community::find($id);
        $communities->com_text = $request->com_text;
        $communities->updated_at = now();

        $communities->save();

        return redirect()->route('community.index');
}

    public function delete($id){
        $com_to_del = Community::find($id);
        $com_to_del->delete();
        return redirect()->route('community.show');
    }
}
