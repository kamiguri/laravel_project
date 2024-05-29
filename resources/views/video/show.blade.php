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
    <form action="{{route('video.delete',$video->id)}}" method="POST">
        @csrf
        <button>削除</button>
    </form>
    <a href="{{route('video.edit',$video->id)}}">編集画面へ</a><br>
    <a href="/video/index">一覧画面へ戻る</a>
</x-app-layout>
