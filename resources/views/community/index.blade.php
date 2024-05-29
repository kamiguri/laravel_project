<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Community') }}
        </h2>
    </x-slot>
    <h1>Community</h1>
    @foreach ($errors->all() as $error)
    <li> <span class="error">{{ $error }}</span></li>
@endforeach

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
    <h1><a href="/community/create">投稿画面へ</a></h1>
</x-app-layout>
