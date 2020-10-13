<x-app-layout>
    <x-app-header class="py-6 bg-red-500 mb-12">
        <h2 class="text-3xl leading-9 font-semibold tracking-tight text-gray-900 md:text-4xl md:leading-10">
            <span class="inline-flex space-x-6 items-center">
                <x-icon-link-external class="h-6 w-6" />
                <span>{{ $feed->url }}</span>
            </span>
        </h2>
    </x-app-header>

    <x-app-container>
        <section class="mb-12">
            @forelse($feed->items as $item)
                <livewire:profile.feed-card :item="$item" />
            @empty
                <p>This feed has no items yet</p>
            @endforelse
        </section>
    </x-app-container>
</x-app-layout>
