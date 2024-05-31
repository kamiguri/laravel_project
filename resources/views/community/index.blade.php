<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Community') }}
        </h1>
    </x-slot>
    <h1>コミュニティへようこそ</h1>
    <h1><a href="/community/create">コミュニティ投稿画面へ</a></h1>
    <h1><a href="/community/show">自分の投稿へ</a></h1>

    @foreach ($communities as $community)
    <div class="border rounded-lg w-2/3 p-5 mt-5">
        <a href="{{ route('community.detail', $community->id) }}">
        <div>
            @if ($community->path)
            <img src="{{ Storage::url($community->path) }}" alt="Community Image">
            @else
                <p>//////////////////////</p>
            @endif
        </div>
        <div>
            <p>{{ $community->user->name }}</p>
        </div>
        <div>
            <p>{{ $community->com_text }}</p>
        </div>
    </a>
    </div>
    @endforeach

</x-app-layout>
