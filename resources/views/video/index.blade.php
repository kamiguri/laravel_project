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

    <h1><a href="/video/create">動画投稿画面へ</a></h1>

    <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:gap-x-8">
        @if(isset($video_query))
            @foreach($video_query as $query)
            <div class="video-item">
                <a href="{{route('video.show',$query->id)}}">
                    <p>タイトル：{{$query->title}}</p>
                    <video controls width="400" muted>
                        <source src="{{ asset($query->path) }}">
                    </video>
                    <p>概要：{{$query->overview}}</p>
                    <p>作成者：{{$query->user->name}}</p>
                </a>
            </div>
            @endforeach
        @else
            @foreach($videos as $video)
                <div class="video-item">
                    <a href="{{route('video.show',$video->id)}}">
                        <p>タイトル：{{$video->title}}</p>
                        <video controls width="400" muted>
                            <source src="{{ asset($video->path) }}">
                        </video>
                        <p>概要：{{$video->overview}}</p>
                        <p>作成者：{{$video->user->name}}</p>
                    </a>
                </div>
            @endforeach
        @endif
    </div>
</x-app-layout>
