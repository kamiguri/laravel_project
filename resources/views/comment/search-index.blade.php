<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('コメント検索') }}
        </h2>
    </x-slot>
    <form action="{{route('comment.search')}}" method="GET">
        <input type="search" name="keywords" value="{{ request('keywords')}}">
        <button>検索</button>
    </form>

    <div>
        @if( request('keywords') )
            @forelse ($comments as $comment)
                @include('comment.index')
            @empty
                <p>該当するコメントはありません</p>
            @endforelse
        @endif
    </div>

</x-app-layout>
