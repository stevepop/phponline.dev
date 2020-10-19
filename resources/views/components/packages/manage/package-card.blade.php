<li class="col-span-1 bg-white rounded-lg shadow">
    <div class="w-full flex items-center justify-between p-6 space-x-6">
        <div class="flex-1 truncate">
            <div class="flex items-center sm:justify-between space-x-3">
                <h3 class="text-gray-900 text-md leading-5 font-medium truncate">
                    {{ $package->title }}
                </h3>
                <span
                    class="flex-shrink-0 inline-block px-2 py-0.5 text-xs leading-4 font-medium rounded-full {{ $package->published ? 'text-teal-800 bg-teal-100' : 'text-gray-800 bg-gray-100' }}"
                >
                    {{ $package->published ? 'Published' : 'Pending' }}
                </span>
            </div>
        </div>
        <x-icon-packagist
            class="w-12 h-12 bg-gray-300 rounded-full flex-shrink-0"
        />
    </div>
    <div class="border-t border-gray-200">
        <div class="-mt-px flex">
            <div class="w-0 flex-1 flex border-r border-gray-200">
                <a href="#"
                   class="relative -mr-px w-0 flex-1 inline-flex items-center justify-center py-4 text-sm leading-5 text-gray-700 font-medium border border-transparent rounded-bl-lg hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 transition ease-in-out duration-150">
                    <x-icon-share class="w-5 h-5 text-gray-400" />
                    <span class="ml-3">
                        Get share link
                    </span>
                </a>
            </div>
            <div class="-ml-px w-0 flex-1 flex">
                <a href="#"
                   wire:click.prevent="showModal"
                   class="relative w-0 flex-1 inline-flex items-center justify-center py-4 text-sm leading-5 text-gray-700 font-medium border border-transparent rounded-br-lg hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 transition ease-in-out duration-150">
                    <x-icon-trash class="w-5 h-5 text-gray-400" />
                    <span class="ml-3">
                        Remove
                    </span>
                </a>
            </div>
        </div>
    </div>
</li>
