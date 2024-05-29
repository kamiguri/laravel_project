<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, string $id) {
        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->content_id = $id;
        $comment->text = $request->text;
        $comment->save();

        return route('video.show', ['id' => $id]);
    }
}
