<x-app-layout>

    <x-app-container>

        <section class="my-12">
            <div class="flex justify-center md:justify-start items-center py-4 px-3">
                <div class="flex items-center">
                    <img class="w-24 h-24 rounded-full shadow border-2 border-white"
                         src="{{ $profile->user->profile_photo_url }}"
                         alt="{{ $profile->user->name }}">
                    <div class="ml-6">
                        <div class="text-2xl font-normal flex items-center">
                            <span class="mr-2">{{ $profile->user->name }}</span>
                            <span
                                class="w-3 h-3 text-white inline-block text-center rounded-full bg-grey-dark text-2xs">✓</span>
                        </div>
                        @isset($profile->user->twitter_handle)
                            <p class="mt-2 font-hairline text-sm">
                                {{ '@' . $profile->user->twitter_handle }}
                            </p>
                        @endisset
                    </div>
                </div>
            </div>
        </section>

        <livewire:profile.latest-articles
            :user="$profile->user"
        />

        <section class="mb-12">
            packages
        </section>

        <section class="mb-12">
            podcasts
        </section>

        <section class="mb-12">
            feeds
        </section>

        <section class="mb-12">
            links
        </section>

    </x-app-container>

</x-app-layout>
