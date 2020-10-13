<x-app-layout>
    <x-app-header class="py-6 bg-red-500 mb-12">
        <h2 class="text-3xl leading-9 font-semibold tracking-tight text-gray-900 md:text-4xl md:leading-10">
            <span class="block">
                Latest {{ ucwords($level) }} Posts
            </span>
        </h2>
    </x-app-header>

    <x-app-container>
        <section class="mb-12">
            <div class="mt-6 grid gap-16 border-t-2 border-gray-100 pt-3 lg:grid-cols-2 lg:gap-x-5 lg:gap-y-12">
                @foreach ($articles as $article)
                    <x-app-article-card
                        :key="$article->id"
                        :article="$article"
                    />
                @endforeach
            </div>

            <div class="py-6">
                {{ $articles->links() }}
            </div>
        </section>
    </x-app-container>
</x-app-layout>
