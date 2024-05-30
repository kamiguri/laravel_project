<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('You Tube!!') }}
        </h2>
    </x-slot>

@if(Auth::user())
    @foreach($videos as $video)
    <div class="video-item">
            <p>タイトル：{{$video->title}}</p>
            <video controls width="400" muted>
                <source src="{{ asset($video->path) }}">
            </video>
            <p>概要：{{$video->overview}}</p>
            <p>作成者：{{$video->user->name}}</p>
    </div>
    <form action="{{route('video.delete',$video->id)}}" method="POST">
        @csrf
        <button>削除</button>
    </form>
        <a href="{{route('video.edit',$video->id)}}">編集画面へ</a><br>
    @endforeach
@endif

</x-app-layout>
