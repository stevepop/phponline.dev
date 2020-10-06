<x-app-layout>

    <x-app-header class="py-6 bg-red-500 mb-12">
        <h2 class="text-3xl leading-9 font-semibold tracking-tight text-gray-900 md:text-4xl md:leading-10">
            <span class="block">Welcome to PHP Online</span>
            <span class="block text-lg md:text-xl text-gray-700">Your go to place for learning and pushing your PHP career forward</span>
        </h2>
    </x-app-header>

    <livewire:articles.latest-from-the-blog />

    <x-app-simple-cta
        class="bg-red-500 mb-12"
        message="Want to share a resource?"
        text="Sign up now to add a link."
    >
        <x-slot name="actions">
            <div class="mt-8 flex lg:flex-shrink-0 lg:mt-0">
                <div class="inline-flex rounded-md shadow">
                    <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-gray-600 hover:bg-gray-500 transition duration-150 ease-in-out">
                        Sign up
                    </a>
                </div>
            </div>
        </x-slot>
    </x-app-simple-cta>

    <x-app-container>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <livewire:packages.latest-packages />
            <livewire:podcasts.latest-podcasts />
        </div>
    </x-app-container>

    <livewire:articles.latest-tutorials />
</x-app-layout>
