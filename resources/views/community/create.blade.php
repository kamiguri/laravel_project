<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Community') }}
        </h2>
    </x-slot>
    <h1>コミュニティ投稿</h1>

    <form action="{{ route('community.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title">投稿内容</label>
            <input type="text" name="com_text" id="com_text">
        </div>
        <div>
            <label for="image">
                <p>アップロード画像</p>
                <input id="image" type="file" name="image">
            </label>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">アップロード</button>
        </div>
    </form>
    <h1><a href="/community/index">コミュニティ画面へ</a></h1>
</x-app-layout>
