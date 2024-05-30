@auth
<div>
    <form action="{{ route('community.comment.store', [ 'id' => $community->id ])}}" method="POST">
        @csrf
        <textarea name="text" placeholder="コメントする..." rows="1"></textarea>
        <button type="submit">送信</button>
    </form>
</div>
@endauth
