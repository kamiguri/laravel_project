<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Community') }}
        </h1>
    </x-slot>
    <h1>コミュニティ投稿編集</h1>

    <form action="{{ route('community.update') }}" method="POST">
        <div>
            <div>
                <label for="com_text">投稿編集</label>
                <input type="text" name="com_text" value="{{old('com_text', $community->com_text)}}">
            </div>
        </div>
        <div>
            <input type="submit" value="送信">
        </div>
        @csrf
    </form>
    <h1><a href="/community/create">コミュニティ投稿画面へ</a></h1>
    <h1><a href="/community/show">自分の投稿へ</a></h1>
</x-app-layout>



