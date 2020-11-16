<div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
    <div class="space-y-6">
        <div class="space-y-1">
            <h1 class="text-lg leading-6 font-medium text-gray-900">
                Your Podcasts
            </h1>
            <p class="text-sm leading-5 text-gray-500">
                Add your Podcast so that others in the community can find it and tune in!
            </p>
        </div>

        <div class="space-y-2">
            <div class="space-y-1">
                <label for="add_feed" class="block text-sm font-medium leading-5 text-gray-700">
                    Add Podcast
                </label>
                <p id="add_feed_helper" class="sr-only">Enter a URL</p>
                <x-jet-validation-errors class="mb-4"/>
                <div class="flex space-x-3">
                    <div class="flex-grow rounded-md shadow-sm">
                        <input
                            id="add_feed"
                            wire:model="url"
                            class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                            placeholder="https://www.podcastwebsite.com"
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

                    @forelse($podcasts as $podcast)
                        <li class="py-4 flex space-x-3">
                            <div class="flex w-full items-center justify-between space-x-4">
                                <!-- Repo name and link -->
                                <div class="min-w-0 space-y-3">
                                    <div class="relative flex items-center space-x-3">
                                        <span
                                            aria-label="Running"
                                            class="h-4 w-4 {{ $podcast->published ? 'bg-green-100' : 'bg-gray-100' }} rounded-full flex items-center justify-center"
                                        >
                                            <span class="h-2 w-2 {{ $podcast->published ? 'bg-green-400' : 'bg-gray-400' }} rounded-full"></span>
                                        </span>
                                        <span class="block">
                                            <h2 class="text-sm font-medium leading-5">
                                                <a href="#">
                                                    <span class="absolute inset-0"></span>
                                                    {{ $podcast->published ? 'approved' : 'waiting approval' }}
                                                </a>
                                            </h2>
                                        </span>
                                    </div>
                                    <a href="{{ $podcast->external_url }}" target="_blank" rel="nofollow noopener" class="relative group flex items-center space-x-2.5">
                                        <x-icon-rss class="flex-shrink-0 w-5 h-5 text-gray-400 group-hover:text-gray-500" />
                                        <div
                                            class="text-sm leading-5 text-gray-500 group-hover:text-gray-900 font-medium truncate">
                                            {{ $podcast->external_url }}
                                        </div>
                                    </a>
                                </div>
                                <!-- Repo meta info -->
                                <div class="hidden sm:flex flex-col flex-shrink-0 items-end space-y-3">
                                    <p class="flex items-center text-gray-500 text-sm leading-5 space-x-2">
                                        <a wire:click="remove({{ $podcast->id }})" class="inline-flex items-center space-x-2 text-red-400 cursor-pointer">
                                            <x-icon-trash class="w-6 h-6"/>
                                            <span>Remove</span>
                                        </a>
                                        <span>·</span>
                                        <span>{{ $podcast->created_at->format('d M, Y') }}</span>
                                    </p>
                                </div>
                            </div>
                        </li>
                    @empty
                        <li class="py-4 flex space-x-3">
                            <div class="w-full flex items-center justify-center mt-4 py-3 px-4">
                                <p class="text-gray-500">
                                    You haven't added any podcasts yet, please add some!
                                </p>
                            </div>
                        </li>
                    @endforelse
                </ul>
            </div>
            <div>
                {{ $podcasts->links() }}
            </div>
        </div>
    </div>
</div>
