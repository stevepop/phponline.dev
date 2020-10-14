<x-app-layout>
    <x-app-header class="py-6 bg-gray-900 mb-12">
        <h2 class="text-2xl leading-9 font-semibold tracking-tight text-white md:text-3xl md:leading-10">
            <span class="block">
                Podcasts
            </span>
        </h2>
        <x-slot name="actions">
            <div class="mt-4 flex md:mt-0 md:ml-4">
                <span class="ml-3 shadow-sm rounded-md">
                    @auth
                        <a
                            href="{{ route('dashboard:podcasts') }}"
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-gray-900 bg-white hover:bg-gray-50 focus:outline-none focus:shadow-outline-indigo focus:border-red-600 active:bg-gray-50 transition duration-150 ease-in-out"
                        >
                          Submit a podcast
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-gray-900 bg-white hover:bg-gray-50 focus:outline-none focus:shadow-outline-indigo focus:border-red-600 active:bg-gray-50 transition duration-150 ease-in-out"
                        >
                          Log in to submit
                        </a>
                    @endauth
              </span>
            </div>
        </x-slot>
    </x-app-header>

    <x-app-container>
        <section class="mb-12">
            <div class="mt-6 grid gap-16 border-t-2 border-gray-100 pt-3 grid-cols-1 lg:grid-cols-2 lg:gap-y-5">
                @foreach ($podcasts as $podcast)
                    <x-app-podcast-card
                        :podcast="$podcast"
                        :key="$podcast->id"
                    />
                @endforeach
            </div>
        </section>

        <div class="mb-12">
            {{ $podcasts->links() }}
        </div>
    </x-app-container>
</x-app-layout>
