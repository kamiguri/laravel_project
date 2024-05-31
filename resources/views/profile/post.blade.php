<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>


    @foreach($videos as $video)
        @if(Auth::id() === $video->user->id)
            <div class="video-item">
                    <p>タイトル：{{$video->title}}</p>
                    <video controls width="400" muted>
                        <source src="{{ asset($video->path) }}">
                    </video>
            </div>
            <form action="{{route('video.delete',$video->id)}}" method="POST">
                @csrf
                <button>削除</button>
            </form>
            <a href="{{route('video.edit',$video->id)}}">編集画面へ</a><br>
        @endif
    @endforeach
    <h1><a href="/video/create">動画投稿画面へ</a></h1>


</x-app-layout>
