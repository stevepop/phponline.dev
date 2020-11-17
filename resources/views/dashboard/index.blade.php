<x-app-layout>
    <x-app-header class="py-6 bg-gray-900 mb-12">
        <h2 class="text-2xl leading-9 font-semibold tracking-tight text-white md:text-3xl md:leading-10">
            <span class="block">Welcome back, {{ auth()->user()->name }}</span>
        </h2>
    </x-app-header>

    <x-app-container class="mb-12">
        <h2 class="text-gray-500 text-xs font-medium uppercase tracking-wide">
            Your Stats
        </h2>

        <ul
            class="grid grid-cols-1 gap-4 sm:gap-6 sm:grid-cols-2 xl:grid-cols-5 mt-3 mb-12"
            x-max="1"
        >

            @can('create', \App\Models\Article::class)
                <x-app-stat-card>
                    <x-slot name="icon">
                        <x-icon-pencil-alt class="h-6 w-6"/>
                    </x-slot>
                    <x-slot name="title">
                        <a href="{{ route('dashboard:articles') }}"
                           class="text-gray-900 font-medium hover:text-gray-600 transition ease-in-out duration-150">
                            Your Posts
                        </a>
                        <p class="text-gray-500">
                            {{ $user->articles->count() }} in total
                        </p>
                    </x-slot>
                </x-app-stat-card>
            @endcan

            <x-app-stat-card>
                <x-slot name="icon">
                    <x-icon-microphone class="h-6 w-6"/>
                </x-slot>
                <x-slot name="title">
                    <a href="{{ route('dashboard:podcasts') }}"
                       class="text-gray-900 font-medium hover:text-gray-600 transition ease-in-out duration-150">
                        Your Podcasts
                    </a>
                    <p class="text-gray-500">
                        {{ $user->podcasts->count() }} in total
                    </p>
                </x-slot>
            </x-app-stat-card>

            <x-app-stat-card>
                <x-slot name="icon">
                    <x-icon-archive class="h-6 w-6"/>
                </x-slot>
                <x-slot name="title">
                    <a href="{{ route('dashboard:packages') }}"
                       class="text-gray-900 font-medium hover:text-gray-600 transition ease-in-out duration-150">
                        Your Packages
                    </a>
                    <p class="text-gray-500">
                        {{ $user->packages->count() }} in total
                    </p>
                </x-slot>
            </x-app-stat-card>

            <x-app-stat-card>
                <x-slot name="icon">
                    <x-icon-link-external class="h-6 w-6"/>
                </x-slot>
                <x-slot name="title">
                    <a href="{{ route('dashboard:links') }}"
                       class="text-gray-900 font-medium hover:text-gray-600 transition ease-in-out duration-150">
                        Your Links
                    </a>
                    <p class="text-gray-500">
                        {{ $user->links->count() }} in total
                    </p>
                </x-slot>
            </x-app-stat-card>

            <x-app-stat-card>
                <x-slot name="icon">
                    <x-icon-rss class="h-6 w-6"/>
                </x-slot>
                <x-slot name="title">
                    <a href="{{ route('dashboard:feeds') }}"
                       class="text-gray-900 font-medium hover:text-gray-600 transition ease-in-out duration-150">
                        Your Feeds
                    </a>
                    <p class="text-gray-500">
                        {{ $user->profile->feeds->count() }} in total
                    </p>
                </x-slot>
            </x-app-stat-card>

        </ul>

        <div class="bg-white lg:min-w-0 lg:flex-1">
            <div
                class="pl-4 pr-6 pt-4 pb-4 border-b border-t border-gray-200 sm:pl-6 lg:pl-8 xl:pl-6 xl:pt-6 xl:border-t-0">
                <div class="flex items-center">
                    <h1 class="flex-1 text-lg leading-7 font-medium">
                        Your Bookmarks
                    </h1>
                </div>
            </div>
            <livewire:dashboard.bookmark.list-bookmarks />
        </div>

    </x-app-container>
</x-app-layout>
