<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('You Tube!!') }}
        </h2>
    </x-slot>
    <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <form action="{{ route('video.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <div class="mb-3">
                        <x-input-label for="title" :value="__('タイトル')" />
                        <x-text-input id="title" type="text" class="form-control block mt-1 w-full" name="title" value="{{old('title')}}" />
                        @error('title') {{$message}} @enderror
                    </div>
                    <div class="mb-3">
                        <x-input-label for="file" :value="__('ファイルを選択')" />
                        <input id="file" type="file" class="form-control" name="video"><br/>
                        @error('video') {{$message}} @enderror
                    </div>
                    <div class="mb-3">
                        <x-input-label for="overview" :value="__('概要')" />
                        <x-textarea id="overview" type="textarea" class="form-control w-full" name="overview">{{old('overview')}}</x-textarea>
                        @error('overview') {{$message}} @enderror
                    </div>
                </div>
                <div class="flex justify-between">
                    <a href="/video/index"><x-secondary-button>一覧画面へ戻る</x-secondary-button></a>
                    <x-primary-button>アップロード</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
