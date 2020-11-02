<x-app-layout>
    <x-app-header class="py-6 bg-gray-900 mb-12">
        <h2 class="text-3xl leading-9 font-semibold tracking-tight text-white md:text-4xl md:leading-10">
            <span class="block">
                {{ $article->title }}
            </span>
        </h2>
        @auth
            <x-slot name="actions">
                <livewire:user.bookmark-button
                    :model="$article"
                />
            </x-slot>
        @endauth
    </x-app-header>

    <x-app-container>

        <article class="flex flex-col bg-white px-8 py-6 w-full mx-auto rounded-lg shadow mb-12">
            <section class="mb-12">
                <div class="flex border-b pb-3">
                    <a
                        rel="nofollow"
                        title="{{ $article->submittedByUser->name }}"
                        href="{{ route('users:profile', $article->submittedByUser->profile->slug) }}"
                        class="rounded-full h-12 w-12 mr-4 flex-shrink-0 overflow-hidden relative"
                    >
                        <img
                            src="{{ $article->submittedByUser->profile_photo_url }}"
                            alt="{{ $article->submittedByUser->name }}"
                            class="absolute inset-0 w-full h-full"
                        >
                    </a>
                    <div class="flex flex-col leading-tight">
                        <div class="flex items-center">
                            <h3 class="text-lg text-secondary font-bold mb-1">
                                <a href="{{ route('users:profile', $article->submittedByUser->profile->slug) }}">
                                    {{ $article->submittedByUser->name }}
                                </a>
                            </h3>
                        </div>
                        <span class="text-gray-600 text-sm">
                            {{ $article->publish_date ? $article->publish_date->format('d M, Y') : $article->created_at->format('d M, Y') }}
                        </span>
                    </div>
                </div>
            </section>

            <section class="mb-12">
                <div class="w-full text-md leading-7 text-gray-700">
                    {!! $article->excerpt !!}
                </div>
            </section>

            <section class="mb-12">
                <div class="w-full text-md leading-7 text-gray-700">
                    {!! $article->body !!}
                </div>
            </section>
        </article>

    </x-app-container>
</x-app-layout>
