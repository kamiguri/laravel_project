<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('You Tube!!') }}
        </h2>
    </x-slot>
    <form action="{{ route('video.update',$video->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">タイトル：</label>
            <input type="text" class="form-control"  name="title" required><br>
            <label for="file">ファイルを選択：</label>
            <input type="file" class="form-control" name="video" required><br>
            <label for="overview">概要：</label>
            <textarea type="textarea" class="form-control" name="overview" required></textarea><br>
        </div>
        <button type="submit" class="btn btn-primary">アップロード</button>
    </form>
    <a href="/video/index">一覧画面へ戻る</a>
</x-app-layout>