<x-app-layout>
    <x-app-header class="py-6 bg-red-500 mb-12">
        <h2 class="text-3xl leading-9 font-semibold tracking-tight text-gray-900 md:text-4xl md:leading-10">
            <span class="block">
                {{ $package->title }}
            </span>
        </h2>
        @auth
            <x-slot name="actions">
                <livewire:user.bookmark-button
                    :model="$package"
                />
            </x-slot>
        @endauth
    </x-app-header>

    <x-app-container>
        <section class="mb-12">
            Package
        </section>
    </x-app-container>
</x-app-layout>
