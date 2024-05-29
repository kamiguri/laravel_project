<div>
    <form action="{{ route('comment.store')}}" method="POST">
        <textarea name="text" placeholder="コメントする..." rows="1" />
        <button type="submit">送信</button>
    </form>
</div>
