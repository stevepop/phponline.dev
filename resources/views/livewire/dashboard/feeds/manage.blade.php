<div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
    <div class="space-y-6">
        <div class="space-y-1">
            <h1 class="text-lg leading-6 font-medium text-gray-900">
                Your Feeds
            </h1>
            <p class="text-sm leading-5 text-gray-500">
                Add your RSS or ATOM feeds, and we will start pulling in your blog posts, so others can find them
                easily!
            </p>
        </div>

        <div class="space-y-2">
            <div class="space-y-1">
                <label for="add_feed" class="block text-sm font-medium leading-5 text-gray-700">
                    Add Feed
                </label>
                <p id="add_feed_helper" class="sr-only">Enter a URL</p>
                <x-jet-validation-errors class="mb-4"/>
                <div class="flex space-x-3">
                    <div class="flex-grow rounded-md shadow-sm">
                        <input
                            id="add_feed"
                            wire:model="url"
                            class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                            placeholder="https://yourwebsite.com/feed"
                            aria-describedby="add_feed_helper"
                        >
                    </div>
                    <span class="inline-flex rounded-md shadow-sm">
                    <button
                        wire:click="save"
                        type="button"
                        class="py-2 pl-3 pr-4 border border-gray-300 rounded-md flex items-center space-x-1 text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-light-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">
                      <x-icon-plus class="h-5 w-5 text-gray-400"/>
                      <span>Add</span>
                    </button>
                  </span>
                </div>
            </div>

            <div class="border-b border-gray-200">
                <ul class="divide-y divide-gray-200">

                    @forelse($feeds as $feed)
                        <li class="py-4 flex space-x-3">
                            <div class="flex w-full items-center justify-between space-x-4">
                                <!-- Repo name and link -->
                                <div class="min-w-0 space-y-3">
                                    <div class="relative flex items-center space-x-3">
                                        <span
                                            aria-label="Running"
                                            class="h-4 w-4 {{ $feed->approved ? 'bg-green-100' : 'bg-gray-100' }} rounded-full flex items-center justify-center"
                                        >
                                            <span class="h-2 w-2 {{ $feed->approved ? 'bg-green-400' : 'bg-gray-400' }} rounded-full"></span>
                                        </span>
                                        <span class="block">
                                            <h2 class="text-sm font-medium leading-5">
                                                <a href="#">
                                                    <span class="absolute inset-0"></span>
                                                    {{ $feed->approved ? 'approved' : 'waiting approval' }}
                                                </a>
                                            </h2>
                                        </span>
                                    </div>
                                    <a href="{{ $feed->url }}" target="_blank" class="relative group flex items-center space-x-2.5">
                                        <x-icon-rss class="flex-shrink-0 w-5 h-5 text-gray-400 group-hover:text-gray-500" />
                                        <div
                                            class="text-sm leading-5 text-gray-500 group-hover:text-gray-900 font-medium truncate">
                                            {{ $feed->url }}
                                        </div>
                                    </a>
                                </div>
                                <!-- Repo meta info -->
                                <div class="hidden sm:flex flex-col flex-shrink-0 items-end space-y-3">
                                    <p class="flex items-center text-gray-500 text-sm leading-5 space-x-2">
                                        <a wire:click="remove({{ $feed->id }})" class="inline-flex items-center space-x-2 text-red-400 cursor-pointer">
                                            <x-icon-trash class="w-6 h-6"/>
                                            <span>Remove</span>
                                        </a>
                                        <span>·</span>
                                        <span>{{ $feed->created_at->format('d M, Y') }}</span>
                                    </p>
                                </div>
                            </div>
                        </li>
                    @empty
                        <li class="py-4 flex space-x-3">
                            <div class="w-full flex items-center justify-center mt-4 py-3 px-4">
                                <p class="text-gray-500">
                                    You haven't added any feeds yet, please add some!
                                </p>
                            </div>
                        </li>
                    @endforelse
                </ul>
            </div>
            <div>
                {{ $feeds->links() }}
            </div>
        </div>
    </div>
</div>
{{--<div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6">--}}
{{--    <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-no-wrap">--}}
{{--        <div class="ml-4 mt-4">--}}
{{--            <h3 class="text-lg leading-6 font-medium text-gray-900">--}}
{{--                Your Feeds--}}
{{--            </h3>--}}
{{--            <p class="mt-1 text-sm leading-5 text-gray-500">--}}
{{--                Add your RSS or ATOM feeds, and we will start pulling in your blog posts, so others can find them easily!.--}}
{{--            </p>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <ul>--}}
{{--        @forelse($feeds as $feed)--}}
{{--            <li class="w-full">--}}
{{--                <a href="#" class="block hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">--}}
{{--                    <div class="px-4 py-4 sm:px-6">--}}

{{--                        <div class="flex items-center justify-between">--}}
{{--                            <div class="text-lg leading-5 font-medium text-indigo-600 truncate">--}}
{{--                                {{ $feed->url }}--}}
{{--                            </div>--}}
{{--                            <div class="ml-2 flex-shrink-0 flex">--}}
{{--                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $feed->approved ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">--}}
{{--                                    {{ $feed->approved ? 'approved' : 'pending approval'}}--}}
{{--                                </span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="mt-2 sm:flex sm:justify-between">--}}
{{--                            <div class="sm:flex">--}}
{{--                                <div class="mr-6 flex items-center text-sm leading-5 text-gray-500">--}}
{{--                                    Bookmarked x times--}}
{{--                                </div>--}}
{{--                                <div class="mt-2 flex items-center text-sm leading-5 text-gray-500 sm:mt-0">--}}
{{--                                    {{ $feed->items->count() }} Feed Items--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="mt-2 flex items-center text-sm leading-5 text-gray-500 sm:mt-0">--}}
{{--                                <span>--}}
{{--                                    Created--}}
{{--                                    <time datetime="2020-01-07">--}}
{{--                                        {{ $feed->created_at->diffForHumans() }}--}}
{{--                                    </time>--}}
{{--                                </span>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--        @empty--}}
{{--            <li>--}}
{{--                <div class="w-full flex items-center justify-center mt-4 py-3 px-4">--}}
{{--                    <p class="text-gray-500">--}}
{{--                        You haven't added any feeds yet, please add some!--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--        @endforelse--}}
{{--    </ul>--}}

{{--</div>--}}
