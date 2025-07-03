<x-home>
    <section class="max-w-5xl mx-auto px-4 py-8">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h1 class="text-5xl font-bold mb-4">{{ $post->title }}</h1>
            <p class="text-gray-600 mb-4">By {{ $post->user->name }} on {{ $post->created_at->format('F j, Y') }}</p>
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                class="w-full h-80 object-cover rounded-lg mb-6">
            <div class="prose">
                {!! $post->body !!}
            </div>
            @auth
            <livewire:like-button :post="$post">
            @endauth
        </div>
    </section>
</x-home>