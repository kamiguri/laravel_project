<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('You Tube!!') }}
        </h2>
    </x-slot>
    <h1>Video List</h1>
    <div class="video-list">
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
    <h1><a href="/video/create">動画投稿画面へ</a></h1>
</x-app-layout>
