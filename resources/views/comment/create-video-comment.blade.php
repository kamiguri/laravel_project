@auth
<div>
    <form action="{{ route('video.comment.store', [ 'id' => $video->id ])}}" method="POST">
        @csrf
        <textarea name="text" placeholder="コメントする..." rows="1"></textarea>
        <button type="submit">送信</button>
    </form>
</div>
@endauth
