<form action="{{route('video.delete',$video->id)}}" method="POST">
    @csrf
    <button>削除</button>
</form>
<a href="{{route('video.edit',$video->id)}}">編集画面へ</a><br>
