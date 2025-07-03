<x-home>
    {{-- Only show latest post --}}
    <section>
        <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-4 md:grid-cols-4 md:items-center md:gap-8">
                <a href="/posts/{{ $singlePost->id }}" class="md:col-span-3">
                    <img src="{{ asset('storage/' . $singlePost->image) }}" class="rounded w-full h-96 object-cover"
                        alt="" />
                </a>

                <div class="md:col-span-1">
                    <div class="max-w-lg md:max-w-none">
                        <a href="/posts/{{ $singlePost->id }}" class="text-2xl font-semibold text-gray-900 sm:text-3xl">
                            {{ Str::limit($singlePost->title, 40) }}
                        </a>

                        <div class="mt-4 text-gray-700 prose prose-invert">
                            {!! Str::limit($singlePost->body, 125) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- List all post --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 flex flex-col gap-y-10">
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
                <img alt="/posts/{{ $post->id }}"
                    src="{{ asset('storage/' . $post->image) }}"
                    class="aspect-square h-full w-full object-cover" />
            </div>

            <div class="flex flex-1 flex-col justify-between">
                <div class="border-s border-gray-900/10 p-4 sm:border-l-transparent sm:p-6">
                    <a href="/posts/{{ $post->id }}">
                        <h3 class="font-bold text-gray-900 uppercase">
                            {{ Str::limit($post->title, 80) }}
                        </h3>
                    </a>

                    <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-700">
                        {!! Str::limit($post->body, 330) !!}
                    </p>
                </div>

                <div class="sm:flex sm:items-end sm:justify-end">
                    <a href="/posts/{{ $post->id }}"
                        class="block bg-yellow-300 px-5 py-3 text-center text-xs font-bold text-gray-900 uppercase transition hover:bg-yellow-400">
                        Read Blog
                    </a>
                </div>
            </div>
        </article>
        @endforeach
    </section>

    <a wire:navigate href="{{ route('posts.index') }}"
        class="mx-auto mt-8 block max-w-max rounded-md bg-teal-600 px-5 py-2.5 text-sm font-medium text-white transition hover:bg-teal-700">
        Read More</a>
</x-home>