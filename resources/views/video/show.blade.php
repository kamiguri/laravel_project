<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>
    <a href="/video/index">一覧画面へ戻る</a>

    <div class="grid grid-cols-1 gap-4 lg:grid-cols-3">
        <div class="col-span-2">

            <video controls autoplay preload class="rounded-lg">

                <source src="{{ url($video->path) }}">
            </video>
            <p class="text-2xl font-bold mt-2">{{$video->title}}</p>
            <div class="flex items-center pl-5 mt-2">
                <div>
                    <p class="font-semibold">{{$video->user->name}}</p>
                    <p class="text-sm">登録者数：{{$subscribers}}</p>
                </div>
                @if(Auth::id() !== $video->user->id)
                <div class="ml-7">
                    <form action="{{route('subsc.store',$video->user->id)}}" method="POST">
                        @csrf
                        @if($is_subscribed)
                        <x-secondary-button id="subscButton" type="submit">登録解除</x-secondary-button>
                        @else
                        <x-primary-button id="subscButton">登録</x-primary-button>
                        @endif
                    </form>
                </div>
                @endif
            </div>
            <div class="rounded bg-neutral-200 mt-2 p-3">
                <div id="video_overview" class="cursor-pointer">
                    <p class="font-medium">{{$video->created_at}}</p>
                    <p id="video_overview_text" class="w-1/4 truncate">{{$video->overview}}</p>
                    <p id="show_more_phrase">...もっと見る</p>
                </div>
                <button id="close_video_overview_btn" class="hidden font-light mt-4">一部を表示</button>
            </div>
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
