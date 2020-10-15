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

        <ul class="grid grid-cols-1 gap-4 sm:gap-6 sm:grid-cols-2 xl:grid-cols-5 mt-3 mb-12" x-max="1">

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
            <ul class="relative z-0 divide-y divide-gray-200 border-b border-gray-200">

                @forelse($user->bookmarks as $bookmark)

{{--                    {{ dd($bookmark) }}--}}

                    @switch($bookmark->displayName())
                        @case('Article')
                            @php
                                $name = 'Article';
                                $route = route('articles:show', [$bookmark->bookmarkable->slug]);
                            @endphp
                        @break
                        @case('Package')
                            @php
                                $name = 'Package';
                                $route = route('packages:show', [$bookmark->bookmarkable->slug]);
                            @endphp
                        @break
                        @case('Podcast')
                            @php
                                $name = 'Podcast';
                                $route = route('click:track', [$bookmark->bookmarkable->clicks->uuid]);
                            @endphp
                        @break
                        @case('Event')
                        @php
                            $name = 'Event';
                            $route = route('click:track', [$bookmark->bookmarkable->clicks->uuid]);
                        @endphp
                        @break
                    @endswitch
                    <li class="relative pl-4 pr-6 py-5 hover:bg-gray-50 sm:py-6 sm:pl-6 lg:pl-8 xl:pl-6">
                        <div class="flex items-center justify-between space-x-4">
                            <!-- Repo name and link -->
                            <div class="min-w-0 space-y-3">
                                <div class="flex items-center space-x-3">
                                <span aria-label="Running"
                                      class="h-4 w-4 bg-green-100 rounded-full flex items-center justify-center">
                                    <span class="h-2 w-2 bg-green-400 rounded-full"></span>
                                </span>
                                    <span class="block">
                                        <h2 class="text-sm font-medium leading-5">
                                            <a href="{{ $route }}">
                                                <span class="absolute inset-0"></span>
                                                {{ $bookmark->bookmarkable }}
                                            </a>
                                        </h2>
                                    </span>
                                </div>
                                <a href="{{ $route }}" class="relative group flex items-center space-x-2.5">
                                    @switch($name)
                                        @case('Article')
                                            <x-icon-pencil-alt class="flex-shrink-0 w-5 h-5 text-gray-400 group-hover:text-gray-500" />
                                        @break
                                        @case('Package')
                                            <x-icon-archive class="flex-shrink-0 w-5 h-5 text-gray-400 group-hover:text-gray-500" />
                                        @break
                                        @case('Podcast')
                                            <x-icon-microphone class="flex-shrink-0 w-5 h-5 text-gray-400 group-hover:text-gray-500" />
                                        @break
                                    @endswitch
                                    <div
                                        class="text-sm leading-5 text-gray-500 group-hover:text-gray-900 font-medium truncate">
                                        {{ $name }}
                                    </div>
                                </a>
                            </div>
                            <div class="sm:hidden">
                                <svg class="h-5 w-5 text-gray-400" x-description="Heroicon name: chevron-right"
                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                          d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                          clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <!-- Repo meta info -->
                            <div class="hidden sm:flex flex-col flex-shrink-0 items-end space-y-3">
                                <p class="flex items-center space-x-4">
                                    <a href="{{ $route }}"
                                       class="relative text-sm leading-5 text-gray-500 hover:text-gray-900 font-medium">
                                        View bookmark
                                    </a>
                                </p>
                                <p class="flex text-gray-500 text-sm leading-5 space-x-2">
                                    <span>bookmarked {{ $bookmark->created_at->diffForHumans() }}</span>
                                </p>
                            </div>
                        </div>
                    </li>
                @empty
                    <li class="relative pl-4 pr-6 py-5 hover:bg-gray-50 sm:py-6 sm:pl-6 lg:pl-8 xl:pl-6">
                        <div class="flex items-center justify-center space-x-4">
                            Nothing to see here, please bookmark some content.
                        </div>
                    </li>
                @endforelse

            </ul>
        </div>

    </x-app-container>
</x-app-layout>
