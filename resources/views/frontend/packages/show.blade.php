<x-app-layout>
    <x-app-header class="py-6 bg-gray-900 mb-12">
        <h2 class="text-3xl leading-9 font-semibold tracking-tight text-white md:text-4xl md:leading-10">
            <a href="{{ route('click:track', $package->clicks->uuid) }}" target="__blank" rel="noopener"
               class="inline-flex items-center space-x-3">
                <x-icon-link-external class="w-6 h-6"/>
                <span>
                    {{ $package->title }}
                </span>
            </a>
        </h2>
        @auth
            <x-slot name="actions">
                <livewire:user.bookmark-button
                    :model="$package"
                />
            </x-slot>
        @endauth
    </x-app-header>

    <x-app-container>
        <section class="my-12">
            {{ $package->body }}
        </section>

        @if(! is_null($package->json))
            <section class="my-12">
                <div>
                    <div class="mt-5 grid grid-cols-1 rounded-lg bg-white overflow-hidden shadow md:grid-cols-3">
                        <div>
                            <div class="px-4 py-5 sm:p-6">
                                <dl>
                                    <dt class="text-base leading-6 font-normal text-gray-900">
                                        Package Version
                                    </dt>
                                    <dd class="mt-1 flex justify-between items-baseline md:block lg:flex">
                                        <div
                                            class="flex items-baseline text-2xl leading-8 font-semibold text-indigo-600">
                                            {{ $package->json['version'] ?? 'no version published' }}
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                        <div class="border-t border-gray-200 md:border-0 md:border-l">
                            <div class="px-4 py-5 sm:p-6">
                                <dl>
                                    <dt class="text-base leading-6 font-normal text-gray-900">
                                        Package Type
                                    </dt>
                                    <dd class="mt-1 flex justify-between items-baseline md:block lg:flex">
                                        <div
                                            class="flex items-baseline text-2xl leading-8 font-semibold text-indigo-600">
                                            {{ $package->json['type'] ?? 'no type registered' }}
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                        <div class="border-t border-gray-200 md:border-0 md:border-l">
                            <div class="px-4 py-5 sm:p-6">
                                <dl>
                                    <dt class="text-base leading-6 font-normal text-gray-900">
                                        License
                                    </dt>
                                    <dd class="mt-1 flex justify-between items-baseline md:block lg:flex">
                                        <div
                                            class="flex items-baseline text-2xl leading-8 font-semibold text-indigo-600">
                                            {{ $package->json['license'][0] ?? 'license not readable' }}
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

            </section>

            <section class="my-12">
                <div class="bg-white lg:min-w-0 lg:flex-1">
                    <div class="pl-4 pr-6 pt-4 pb-4 border-b border-t border-gray-200 sm:pl-6 lg:pl-8 xl:pl-6 xl:pt-6 xl:border-t-0">
                        <div class="flex items-center">
                            <h3 class="flex-1 text-lg leading-7 font-medium">
                                Required Dependencies
                            </h3>
                        </div>
                    </div>

                    <ul class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 p-6">
{{--                        @foreach ($package->json['require'] as $package => $version)--}}
{{--                            <li class="col-span-1 bg-white rounded-lg shadow">--}}
{{--                                <div class="w-full flex items-center justify-between p-6 space-x-6">--}}
{{--                                    <div class="flex-1 truncate">--}}
{{--                                        <div class="flex items-center justify-between space-x-3">--}}
{{--                                            <h3 class="text-gray-900 text-sm leading-5 font-medium truncate">--}}
{{--                                                {{ $package }}--}}
{{--                                            </h3>--}}
{{--                                            <span class="flex-shrink-0 inline-block px-2 py-0.5 text-teal-800 text-xs leading-4 font-medium bg-teal-100 rounded-full">--}}
{{--                                                {{ $version }}--}}
{{--                                            </span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        @endforeach--}}
                    </ul>
                </div>
            </section>

            <section class="my-12">
                <div class="bg-white lg:min-w-0 lg:flex-1">
                    <div class="pl-4 pr-6 pt-4 pb-4 border-b border-t border-gray-200 sm:pl-6 lg:pl-8 xl:pl-6 xl:pt-6 xl:border-t-0">
                        <div class="flex items-center">
                            <h3 class="flex-1 text-lg leading-7 font-medium">
                                Development Dependencies
                            </h3>
                        </div>
                    </div>

                    {{ dd($package) }}

                    <ul class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 p-6">
{{--                        @foreach ($package->json['require-dev'] as $package => $version)--}}
{{--                            <li class="col-span-1 bg-white rounded-lg shadow">--}}
{{--                                <div class="w-full flex items-center justify-between p-6 space-x-6">--}}
{{--                                    <div class="flex-1 truncate">--}}
{{--                                        <div class="flex items-center justify-between space-x-3">--}}
{{--                                            <h3 class="text-gray-900 text-sm leading-5 font-medium truncate">--}}
{{--                                                {{ $package }}--}}
{{--                                            </h3>--}}
{{--                                            <span class="flex-shrink-0 inline-block px-2 py-0.5 text-teal-800 text-xs leading-4 font-medium bg-teal-100 rounded-full">--}}
{{--                                                {{ $version }}--}}
{{--                                            </span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        @endforeach--}}
                    </ul>
                </div>
            </section>

            <section class="my-12">
{{--                @foreach ($package->json as $key => $value)--}}
{{--                    <p>{{ $key}}</p>--}}
{{--                @endforeach--}}
            </section>
        @endif

    </x-app-container>
</x-app-layout>
