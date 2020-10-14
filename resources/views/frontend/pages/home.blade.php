<x-app-layout>

    <div class="flex items-center justify-between bg-gray-900 mb-12 shadow-inner">
        <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:flex lg:items-center lg:justify-between py-12 lg:py-0">
            <div>
                <h2 class="text-3xl leading-9 font-semibold tracking-tight text-white md:text-4xl md:leading-10">
                    <span class="block">Welcome to PHP Online</span>
                    <span class="block text-lg text-medium md:text-xl text-white">Your go to place for learning and pushing your PHP career forward</span>
                </h2>
            </div>
            <div class="-mt-10 -mb-28 lg:block hidden">
                <x-illustration-working class="h-96" />
            </div>
        </div>
    </div>

    <livewire:articles.latest-from-the-blog />

    <livewire:packages.latest-packages />

    <livewire:podcasts.latest-podcasts />

{{--    <x-app-simple-cta--}}
{{--        class="bg-red-500 mb-12"--}}
{{--        message="Want to share a resource?"--}}
{{--        text="Sign up now to add a link."--}}
{{--    >--}}
{{--        <x-slot name="actions">--}}
{{--            <div class="mt-8 flex lg:flex-shrink-0 lg:mt-0">--}}
{{--                <div class="inline-flex rounded-md shadow">--}}
{{--                    <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-gray-600 hover:bg-gray-500 transition duration-150 ease-in-out">--}}
{{--                        Sign up--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </x-slot>--}}
{{--    </x-app-simple-cta>--}}

    <livewire:articles.latest-tutorials />
</x-app-layout>
