@auth
<div class="w-full">
    <form action="{{ route('video.comment.store', [ 'id' => $video->id ])}}" method="POST">
        @csrf
        <x-textarea name="text" placeholder="コメントする..." class="w-full" rows="1" required></x-textarea>
        <div class="flex justify-end">
            <x-primary-button type="submit">送信</x-primary-button>
        </div>
    </form>
</div>
@endauth
