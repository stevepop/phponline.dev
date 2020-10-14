<div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
    <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-no-wrap">
        <div class="ml-4 mt-4">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Your Feeds
            </h3>
            <p class="mt-1 text-sm leading-5 text-gray-500">
                Add your RSS or ATOM feeds, and we will start pulling in your blog posts, so others can find them easily!.
            </p>
        </div>
        <div class="ml-4 mt-4 flex-shrink-0">
            <span class="inline-flex rounded-md shadow-sm">
                <button
                    wire:click="showModal"
                    wire:loading.attr="disabled"
                    type="button"
                    class="relative inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:shadow-outline-indigo focus:border-indigo-700 active:bg-indigo-700"
                >
                    Add new feed
                </button>
            </span>
        </div>
    </div>

    <ul>
        @forelse($feeds as $feed)
            <li class="w-full">
                <a href="#" class="block hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
                    <div class="px-4 py-4 sm:px-6">

                        <div class="flex items-center justify-between">
                            <div class="text-lg leading-5 font-medium text-indigo-600 truncate">
                                {{ $feed->url }}
                            </div>
                            <div class="ml-2 flex-shrink-0 flex">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $feed->approved ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                    {{ $feed->approved ? 'approved' : 'pending approval'}}
                                </span>
                            </div>
                        </div>
                        <div class="mt-2 sm:flex sm:justify-between">
                            <div class="sm:flex">
                                <div class="mr-6 flex items-center text-sm leading-5 text-gray-500">
                                    Bookmarked x times
                                </div>
                                <div class="mt-2 flex items-center text-sm leading-5 text-gray-500 sm:mt-0">
                                    {{ $feed->items->count() }} Feed Items
                                </div>
                            </div>
                            <div class="mt-2 flex items-center text-sm leading-5 text-gray-500 sm:mt-0">
                                <span>
                                    Created
                                    <time datetime="2020-01-07">
                                        {{ $feed->created_at->diffForHumans() }}
                                    </time>
                                </span>
                            </div>
                        </div>
          
                    </div>
                </a>
            </li>
        @empty
            <li>
                <div class="w-full flex items-center justify-center mt-4 py-3 px-4">
                    <p class="text-gray-500">
                        You haven't added any feeds yet, please add some!
                    </p>
                </div>
            </li>
        @endforelse
    </ul>

</div>

<!-- Add Modal
<x-jet-dialog-modal wire:model="modalOpen">
    <x-slot name="title">
        Add a new feed
    </x-slot>

    <x-slot name="content">
        Add URL
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="closeModal" wire:loading.attr="disabled">
            {{ __('Nevermind') }}
        </x-jet-secondary-button>

        <x-jet-button class="ml-2" wire:click="addFeed" wire:loading.attr="disabled">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-dialog-modal> -->
