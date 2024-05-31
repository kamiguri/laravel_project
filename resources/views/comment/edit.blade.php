<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>
    <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <p class="text-lg font-bold">コメントの編集</p>
            <form action="{{ route('comment.update', [ 'id' => $comment->id ])}}" method="POST">
                @csrf
                @method('PUT')
                <x-textarea name="text" placeholder="コメントする..." class="w-full" rows="1" required>
                    {{ $comment->text }}
                </x-textarea>
                <div class="flex justify-between">
                    <x-secondary-button onclick="history.back()">戻る</x-secondary-button>
                    <x-primary-button>送信</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
