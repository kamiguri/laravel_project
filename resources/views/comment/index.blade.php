<div>
    <p><b>{{ $comment->user->name }}</b></p>
    <p>{!! nl2br(htmlspecialchars( $comment->text )) !!}</p>
    <small>{{ $comment->created_at }}</small>
    @if (Auth::id() === $comment->user_id)
        <div>
            <a href="{{ route('comment.edit', ['id' => $comment->id]) }}">編集</a>
            <form action="{{ route('comment.destroy', ['id' => $comment->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">削除</button>
            </form>
        </div>
    @endif
</div>
