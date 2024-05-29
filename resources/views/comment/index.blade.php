@foreach ($comments as $comment)
<div>
    <p><b>{{ $comment->user->name }}</b></p>
    <p>{{ $comment->text }}</p>
    <small>{{ $comment->created_at }}</small>
</div>
@empty
<p>コメントはまだありません</p>
@endforeach
