<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('You Tube!!') }}
        </h2>
    </x-slot>
    <p>{{$video->title}}</p>
    <p>{{$video->overview}}</p>
    <video controls width="400" autoplay>
        <source src="{{ url($video->path) }}">
    </video>

    <a href="/video/index">一覧画面へ戻る</a>
    
    @include('comment.create-video-comment')
    @forelse ($video->comments as $comment)
        @include('comment.index')
    @empty
    <p>コメントはまだありません</p>
    @endforelse
</x-app-layout>
