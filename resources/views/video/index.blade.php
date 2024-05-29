<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('You Tube!!') }}
        </h2>
    </x-slot>
    <h1>Video List</h1>
    <form action="{{route('video.index')}}" method="GET">
        @csrf
        <input type="search" name="search" value="{{ request('search')}}">
        <button>検索</button>
    </form>

    <div class="video-list">
        @if(isset($video_query))
            @foreach($video_query as $query)
                <a href="{{route('video.show',$query->id)}}">
                    {{$query->title}}
                    <video controls width="400" muted>
                        <source src="{{ asset($query->path) }}">
                    </video>
                </a>
            @endforeach
        @else
            @foreach($videos as $video)
                <div class="video-item">
                    <a href="{{route('video.show',$video->id)}}">
                        <video controls width="400" muted>
                            <source src="{{ asset($video->path) }}">
                        </video>
                        <p>{{$video->title}}</p>
                    </a>
                </div>
            @endforeach
        @endif
    <h1><a href="/video/create">動画投稿画面へ</a></h1>
</x-app-layout>
