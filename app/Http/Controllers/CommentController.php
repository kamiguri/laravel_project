<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function storeVideoComment(Request $request, string $id) {
        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->commentable_id = $id;
        $comment->commentable_type = Video::class;
        $comment->text = $request->text;
        $comment->save();

        return to_route('video.show', ['id' => $id]);
    }

    public function update(Request $request, string $id) {
        $comment = Comment::find($id);
        $comment->text = $request->text;
        $comment->save();

        return to_route('video.show', ['id' => $comment->commentable_id]);
    }
}
