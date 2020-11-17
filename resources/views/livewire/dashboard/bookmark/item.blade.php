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
                                                {{ $bookmark->bookmarkable->title ?? $bookmark->bookmarkable->url }}
                                            </a>
                                        </h2>
                                    </span>
            </div>
            <a href="{{ $route }}" class="relative group flex items-center space-x-2.5">
                @switch($name)
                    @case('Article')
                    <x-icon-pencil-alt class="flex-shrink-0 w-5 h-5 text-gray-400 group-hover:text-gray-500"/>
                    @break
                    @case('Event')
                    <x-icon-calendar class="flex-shrink-0 w-5 h-5 text-gray-400 group-hover:text-gray-500"/>
                    @break
                    @case('Feed')
                    <x-icon-rss class="flex-shrink-0 w-5 h-5 text-gray-400 group-hover:text-gray-500"/>
                    @break
                    @case('Link')
                    <x-icon-link-external class="flex-shrink-0 w-5 h-5 text-gray-400 group-hover:text-gray-500"/>
                    @break
                    @case('Package')
                    <x-icon-archive class="flex-shrink-0 w-5 h-5 text-gray-400 group-hover:text-gray-500"/>
                    @break
                    @case('Podcast')
                    <x-icon-microphone class="flex-shrink-0 w-5 h-5 text-gray-400 group-hover:text-gray-500"/>
                    @break
                    @case('User Group')
                    <x-icon-users class="flex-shrink-0 w-5 h-5 text-gray-400 group-hover:text-gray-500"/>
                    @break
                @endswitch
                <div
                    class="text-sm leading-5 text-gray-500 group-hover:text-gray-900 font-medium truncate"
                >
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
                   class="relative text-sm leading-5 text-gray-500 hover:text-gray-900 font-medium cursor-pointer">
                    View bookmark
                </a>
                <a wire:click="remove"
                   class="relative text-sm leading-5 text-red-500 hover:text-red-900 font-medium cursor-pointer">
                    Remove bookmark
                </a>
            </p>
            <p class="flex text-gray-500 text-sm leading-5 space-x-2">
                <span>bookmarked {{ $bookmark->created_at->diffForHumans() }}</span>
            </p>
        </div>
    </div>
</li>
