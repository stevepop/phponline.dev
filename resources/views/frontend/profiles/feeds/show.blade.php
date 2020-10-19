<x-app-layout>
    <x-app-header class="py-6 bg-gray-900 mb-12">
        <h2 class="text-3xl leading-9 font-semibold tracking-tight text-white md:text-4xl md:leading-10">
            <span class="inline-flex space-x-6 items-center">
                <x-icon-link-external class="h-6 w-6" />
                <span>{{ $feed->url }}</span>
            </span>
        </h2>
        @auth
            <x-slot name="actions">
                <livewire:user.bookmark-button
                    :model="$feed"
                />
            </x-slot>
        @endauth
    </x-app-header>

    <x-app-container>
        <section class="mb-12">
            @forelse($items as $item)
                <livewire:profile.feed-card :item="$item" />
            @empty
                <p>This feed has no items yet</p>
            @endforelse
        </section>

        <div class="mb-12">
            {{ $items->links() }}
        </div>
    </x-app-container>
</x-app-layout>
