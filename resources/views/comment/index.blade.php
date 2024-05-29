@forelse ($video->comments as $comment)
<div>
    <p><b>{{ $comment->user->name }}</b></p>
    <p>{{ $comment->text }}</p>
    <small>{{ $comment->created_at }}</small>
    @if (Auth::id() === $comment->user_id)
        <div>
            <a href="{{ route('comment.edit', ['id' => $comment->id]) }}">編集</a>
        </div>
    @endif
</div>
@empty
<p>コメントはまだありません</p>
@endforelse
