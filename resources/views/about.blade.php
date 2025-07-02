<x-home>
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="prose prose-invert">
            <h1 class="text-3xl font-bold text-gray-900">About Us</h1>
            <p class="mt-4 text-gray-700">
                {!! $about->text ?? 'No information available.' !!}
            </p>
        </div>
    </section>
</x-home>