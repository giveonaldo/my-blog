<button wire:click="toggleLike">
    @if ($liked)
    <img class="w-6 h-6 object-cover" src="{{ asset('images/heart.png') }}" alt="like" />
    @else
    <img class="w-6 h-6 object-cover" src="{{ asset('images/love.png') }}" alt="like" />
    @endif
</button>