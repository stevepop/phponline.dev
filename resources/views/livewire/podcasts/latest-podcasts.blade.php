<x-app-container>
    <section class="mb-12">
        <div class="flex items-center justify-between">
            <h2 class="text-xl leading-5 tracking-tight font-semibold text-gray-900 sm:text-2xl sm:leading-10">
                Latest podcasts
            </h2>
            <x-app-link
                href="{{ route('podcasts:index') }}"
                title="See all podcasts"
            >
                See all podcasts
            </x-app-link>
        </div>
        <div class="mt-6 grid gap-16 border-t-2 border-gray-100 pt-3 grid-cols-1 lg:grid-cols-2 lg:gap-y-5">
            @foreach ($podcasts as $podcast)
                <x-app-podcast-card
                    :podcast="$podcast"
                    :key="$podcast->id"
                />
            @endforeach
        </div>
    </section>
</x-app-container>
