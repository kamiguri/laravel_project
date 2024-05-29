<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Community') }}
        </h2>
    </x-slot>
    <h1>Community</h1>

    <form action="" method="POST">
        <div>
            <label for="title">投稿内容</label>
            <input type="text" name="com_text" id="com_text">
        </div>
        <div>
            <input type="submit" value="送信">
        </div>

        @csrf
    </form>
    {{-- <div class="community"> --}}
        {{-- @foreach($communities as $community)
            <div class="community-item">
                <a href="{{route('community.show',$community->id)}}">
                    <video controls width="400" muted>
                        <source src="{{ asset($community->path) }}">
                    </video>
                    <p>{{$community->title}}</p>
                </a>

            </div>
        @endforeach --}}
    <h1><a href="/community/create">コミュニティ投稿画面へ</a></h1>
</x-app-layout>
