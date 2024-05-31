<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>
    <form action="{{route('video.index')}}" method="GET">
        @csrf
        <x-text-input type="search" name="search" value="{{ request('search')}}" class="w-2/3" />
        <x-primary-button>検索</x-primary-button>
    </form>



    <div class="mt-6 grid grid-cols-1 gap-x-2 gap-y-10 md:grid-cols-2 lg:grid-cols-4 2xl:grid-cols-4  xl:gap-x-4">
        @if(isset($video_query))
            @foreach($video_query as $query)
            <div class="video-item">
                <a href="{{route('video.show',$query->id)}}">
                    <video width="400" muted class="clip rounded-lg" preload>
                        <source src="{{ asset($query->path) }}" type="video/webm">
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
