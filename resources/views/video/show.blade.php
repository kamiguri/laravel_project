<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('You Tube!!') }}
        </h2>
    </x-slot>
    <a href="/video/index">一覧画面へ戻る</a>

    <div class="grid grid-cols-1 gap-4 lg:grid-cols-3">
        <div class="col-span-2">
            <video controls autoplay>
                <source src="{{ url($video->path) }}">
            </video>
            <p>{{$video->title}}</p>
            <p>{{$video->user->name}}</p>
            <p>{{$video->overview}}</p>
        </div>

        <div>
            @include('comment.create-video-comment')
            @forelse ($video->comments as $comment)
                @include('comment.index')
            @empty
            <p>コメントはまだありません</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
