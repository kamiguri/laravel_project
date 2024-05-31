<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Community') }}
        </h2>
    </x-slot>
    <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <h1 class="text-lg font-bold">コミュニティ投稿</h1>
            <form action="{{ route('community.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mt-3">
                    <x-input-label for="title" :value="__('投稿内容')" />
                    <x-textarea name="com_text" id="com_text" class="w-full"></x-textarea>
                </div>
                <div class="mt-3">
                    <x-input-label for="image" :value="__('アップロード画像')" />
                    <input id="image" type="file" name="image">
                </div>
                <div class="mt-3 flex justify-between">
                    <a href="/community/index"><x-secondary-button>コミュニティ画面へ</x-secondary-button></a>
                    <x-primary-button type="submit" class="btn btn-primary">アップロード</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
