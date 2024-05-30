<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Community') }}
        </h2>
    </x-slot>
    <h1>Community</h1>
    <div>
        <p>
        @if ($community->path)
            <img src="{{ Storage::url($community->path) }}" alt="Community Image">
        @else
            <p>画像は登録されていません</p>
        @endif
        </p>
    </div>
    <div>
        <p>{{ $community->users_id }}</p>
    </div>
    <div>
        <p>{{ $community->com_text }}</p>
    </div>
    <div>
        <form action="{{ route('community.edit', $community->id) }}" method="post">
            <a href="{{route('community.edit', $community->id)}}">編集</a>
            @csrf
        </form>

        <form action="{{route('community.delete', $community->id)}}" method="post">
            <input type="submit"  name="delete" value="削除">
            @csrf
        </form>
    </div>
    <h1><a href="/community/create">コミュニティ投稿画面へ</a></h1>
    <h1><a href="/community/index">投稿一覧画面へ</a></h1>

    @include('comment.create-community-comment')
    @forelse ($community->comments as $comment)
        @include('comment.index')
    @empty
    <p>コメントはまだありません</p>
    @endforelse
</x-app-layout>
