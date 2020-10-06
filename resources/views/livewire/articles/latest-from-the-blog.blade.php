<x-app-container>
    <section class="mb-12">
        <h2 class="text-2xl leading-9 tracking-tight font-semibold text-gray-900 sm:text-3xl sm:leading-10">
            Latest News
        </h2>
        <div class="mt-6 grid gap-16 border-t-2 border-gray-100 pt-3 lg:grid-cols-2 lg:gap-x-5 lg:gap-y-12">
            @foreach ($articles as $article)
                <x-app-article-card
                    :key="$article->id"
                    :article="$article"
                />
            @endforeach
        </div>
    </section>
</x-app-container>
