<x-home>
    <section class="grid grid-cols-3 gap-6 max-w-6xl mx-auto my-10">
        <div class="col-span-2 flex flex-col gap-6">
            @foreach ($posts as $post )
            <article class="flex bg-white transition hover:shadow-xl">
                <div class="rotate-180 p-2 [writing-mode:_vertical-lr]">
                    <time datetime="{{ $post->created_at->toDateString() }}"
                        class="flex items-center justify-between gap-4 text-xs font-bold text-gray-900 uppercase">
                        <span>{{ $post->created_at->format('Y') }}</span>
                        <span class="w-px flex-1 bg-gray-900/10"></span>
                        <span>{{ $post->created_at->format('M d') }}</span>
                    </time>
                </div>

                <div class="hidden sm:block sm:basis-56">
                    <img alt="" src="{{ asset('storage/' . $post->image) }}"
                        class="aspect-square h-full w-full object-cover" />
                </div>

                <div class="flex flex-1 flex-col justify-between">
                    <div class="border-s border-gray-900/10 p-4 sm:border-l-transparent sm:p-6">
                        <a wire:navigate href="/posts/{{ $post->id }}">
                            <h3 class="font-bold text-gray-900 uppercase">
                                {{ Str::limit($post->title, 40) }}
                            </h3>
                        </a>

                        <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-700">
                            {!! Str::limit($post->body, 150) !!}
                        </p>
                    </div>

                    <div class="sm:flex sm:items-end sm:justify-end">
                        <a wire:navigate href="/posts/{{ $post->id }}"
                            class="block bg-yellow-300 px-5 py-3 text-center text-xs font-bold text-gray-900 uppercase transition hover:bg-yellow-400">
                            Read Blog
                        </a>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
        <div class="flex flex-col gap-8 w-full"></div>
    </section>
</x-home>