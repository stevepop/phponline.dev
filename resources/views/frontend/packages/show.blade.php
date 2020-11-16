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
            <div class="w-full text-md leading-7 text-gray-700">
                <x-markdown>{!! $package->body !!}</x-markdown>
            </div>
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
                <x-app-package-dependency-list
                    title="Required Dependencies"
                    :dependencies="$package->json['require']"
                />
            </section>

            <section class="my-12">
                <x-app-package-dependency-list
                    title="Development Dependencies"
                    :dependencies="$package->json['require-dev']"
                />
            </section>
        @endif

    </x-app-container>
</x-app-layout>
