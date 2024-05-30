<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Community') }}
        </h1>
    </x-slot>
    <h1>コミュニティへようこそ</h1>
    @foreach ($errors->all() as $error)
    <li> <span class="error">{{ $error }}</span></li>
    @endforeach

    @foreach ($communities as $community)
    <div>
        <p>{{ $community->users_id }}</p>
    </div>
    <div>
        <p>{{ $community->com_text }}</p>
    </div>
    @endforeach

    <h1><a href="/community/create">コミュニティ投稿画面へ</a></h1>
    <h1><a href="/community/show">自分の投稿へ</a></h1>
</x-app-layout>
