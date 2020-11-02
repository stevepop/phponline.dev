<x-app-layout>
    <x-app-header class="py-6 bg-gray-900 mb-12">
        <h2 class="text-3xl leading-9 font-semibold tracking-tight text-white md:text-4xl md:leading-10">
            <span class="block">
                {{ $profile->user->name }}
            </span>
        </h2>
    </x-app-header>

    <x-app-container>
        <section class="mb-12">
            <livewire:profile.feed-list :profile="$profile" />
        </section>
    </x-app-container>
</x-app-layout>
