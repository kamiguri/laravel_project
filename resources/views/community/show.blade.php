<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Community') }}
        </h2>
    </x-slot>
    <h1>Community</h1>

    @foreach ($communities as $community)
    @if ($community->users_id === Auth::id())
    <div>
        <p>{{ $community->users_id }}</p>
    </div>
    <div>
        <p>{{ $community->com_text }}</p>
    </div>
    <div>
        @if ($community->path)
        <img src="{{ Storage::url($community->path) }}" alt="Community Image">
        @else
            <p>//////////////////////</p>
        @endif
    </div>
    <div>
        <form action="{{ route('community.edit', $community->id) }}" method="post">
            <a href="{{ route('community.edit', $community->id)}}">編集</a>
            @csrf
        </form>

        <form action="{{ route('community.delete', $community->id)}}" method="post">
            <input type="submit"  name="delete" value="削除">
            @csrf
        </form>
    </div>
    @endif
    @endforeach

    <h1><a href="/community/create">コミュニティ投稿画面へ</a></h1>
    <h1><a href="/community/index">投稿一覧画面へ</a></h1>
</x-app-layout>
