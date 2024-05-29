<div>
    <form action="{{ route('comment.update', [ 'id' => $comment->id ])}}" method="POST">
        @csrf
        @method('PUT')
        <textarea name="text" placeholder="コメントする..." rows="1">
            {{ $comment->text }}
        </textarea>
        <button type="submit">送信</button>
    </form>
</div>
