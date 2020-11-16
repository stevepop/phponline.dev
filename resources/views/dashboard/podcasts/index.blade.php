<x-app-layout>
    <x-app-header class="py-6 bg-gray-900 mb-12">
        <h2 class="text-2xl leading-9 font-semibold tracking-tight text-white md:text-3xl md:leading-10">
            Manage your podcasts
        </h2>
    </x-app-header>
    <x-app-container class="mb-12">
        <div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
            <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-no-wrap">
                <div class="ml-4 mt-4">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Your Podcasts
                    </h3>
                    <p class="mt-1 text-sm leading-5 text-gray-500">
                        Add your Podcast so that others in the community can find it and tune in!
                    </p>
                </div>
                <div class="ml-4 mt-4 flex-shrink-0">
                  <span class="inline-flex rounded-md shadow-sm">
                    <button type="button" class="relative inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:shadow-outline-indigo focus:border-indigo-700 active:bg-indigo-700">
                      Add a new podcast
                    </button>
                  </span>
                </div>
            </div>
        </div>

        <div class="bg-white border-b border-gray-200">
            <ul class="divide-y divide-gray-200">
                @forelse($podcasts as $podcast)
                    <li class="px-4 py-5 flex space-x-3">
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
                                    <x-icon-microphone class="flex-shrink-0 w-5 h-5 text-gray-400 group-hover:text-gray-500" />
                                    <div
                                        class="text-sm leading-5 text-gray-500 group-hover:text-gray-900 font-medium truncate">
                                        {{ $podcast->external_url }}
                                    </div>
                                </a>
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

    </x-app-container>
</x-app-layout>
