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
                    <video width="400" muted class="clip rounded-lg">
                        <source src="{{ asset($query->path) }}">
                    </video>
                    <div class="px-5">
                        <p class="text-lg font-semibold">{{$query->title}}</p>
                        <p class="text-sm text-slate-600">{{$query->user->name}}</p>
                    </div>
                </a>
            </div>
            @endforeach
        @else
            @foreach($videos as $video)
                <div class="video-item">
                    <a href="{{route('video.show',$video->id)}}">
                        <video width="400" muted class="clip rounded-lg">
                            <source src="{{ asset($video->path) }}">
                        </video>
                        <div class="px-5">
                            <p class="text-lg font-semibold">{{$video->title}}</p>
                            <p class="text-sm text-slate-600">{{$video->user->name}}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        @endif
    </div>
</x-app-layout>
