<div class="flex bg-white w-full mx-auto rounded-lg shadow-md hover:shadow-lg h-56">
    <div>
        <img class="w-96 h-56 rounded hidden md:block bg-gray-900" src="{{ $podcast->cover_image }}" alt="{{ $podcast->title }}" />
    </div>
    <div class="w-full p-8 flex flex-col items-center justify-center space-y-3">
        <h3 class="text-2xl text-grey-darkest font-medium">
            {{ $podcast->title }}
        </h3>

        <a href="{{ route('click:track', $podcast->clicks->uuid) }}" class="flex items-center mt-4 text-gray-700 cursor-pointer">
            <x-icon-link-external class="h-6 w-6" />
            <p class="px-2 text-sm">
                {{ $podcast->external_url }}
            </p>
        </a>
        @auth
            <livewire:user.bookmark-button
                :model="$podcast"
                color="gray-900"
                hover="gray-400"
            />
        @endauth
    </div>
</div>

