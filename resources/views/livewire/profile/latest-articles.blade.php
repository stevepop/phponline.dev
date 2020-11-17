<section class="mb-12">
    <div class="mt-6 grid gap-16 border-t-2 border-gray-100 pt-3 grid-cols-1 lg:grid-cols-3 lg:gap-x-5 lg:gap-y-12">
        @foreach ($articles as $article)
            <x-app-article-card
                :key="$article->id"
                :article="$article"
            />
        @endforeach
    </div>

    <div class="my-6">
        {{ $articles->links() }}
    </div>

</section>
