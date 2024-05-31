<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('コメント検索') }}
        </h2>
    </x-slot>
    <form action="{{route('comment.search')}}" method="GET">
        <x-text-input type="search" name="keywords" class="w-2/3" value="{{ request('keywords')}}" />
        <x-primary-button>検索</x-primary-button>
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
