<x-app-layout>
    <x-app-header class="py-6 bg-red-500 mb-12">
        <h2 class="text-2xl leading-9 font-semibold tracking-tight text-gray-900 md:text-3xl md:leading-10">
            <span class="block">Welcome back, {{ auth()->user()->name }}</span>
        </h2>
    </x-app-header>

    <x-app-container class="mb-12">
        <h2 class="text-gray-500 text-xs font-medium uppercase tracking-wide">
            Your Stats
        </h2>

        <ul class="grid grid-cols-1 gap-4 sm:gap-6 sm:grid-cols-2 xl:grid-cols-4 mt-3" x-max="1">

            <x-app-stat-card>
                <x-slot name="icon">
                    <x-icon-pencil-alt class="h-6 w-6" />
                </x-slot>
                <x-slot name="title">
                    <a href="#" class="text-gray-900 font-medium hover:text-gray-600 transition ease-in-out duration-150">
                        Your Posts
                    </a>
                    <p class="text-gray-500">
                        {{ $user->articles->count() }} in total
                    </p>
                </x-slot>
            </x-app-stat-card>

            <x-app-stat-card>
                <x-slot name="icon">
                    <x-icon-microphone class="h-6 w-6" />
                </x-slot>
                <x-slot name="title">
                    <a href="#" class="text-gray-900 font-medium hover:text-gray-600 transition ease-in-out duration-150">
                        Your Podcasts
                    </a>
                    <p class="text-gray-500">
                        {{ $user->podcasts->count() }} in total
                    </p>
                </x-slot>
            </x-app-stat-card>

            <x-app-stat-card>
                <x-slot name="icon">
                    <x-icon-archive class="h-6 w-6" />
                </x-slot>
                <x-slot name="title">
                    <a href="#" class="text-gray-900 font-medium hover:text-gray-600 transition ease-in-out duration-150">
                        Your Packages
                    </a>
                    <p class="text-gray-500">
                        {{ $user->packages->count() }} in total
                    </p>
                </x-slot>
            </x-app-stat-card>

            <x-app-stat-card>
                <x-slot name="icon">
                    <x-icon-link-external class="h-6 w-6" />
                </x-slot>
                <x-slot name="title">
                    <a href="#" class="text-gray-900 font-medium hover:text-gray-600 transition ease-in-out duration-150">
                        Your Links
                    </a>
                    <p class="text-gray-500">
                        {{ $user->links->count() }} in total
                    </p>
                </x-slot>
            </x-app-stat-card>

        </ul>
    </x-app-container>
</x-app-layout>
