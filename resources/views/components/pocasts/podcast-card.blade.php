<div class="bg-white shadow-md rounded-md">
    <div class="flex items-center px-6 py-3 bg-gray-900">
        <x-icon-microphone class="h-6 w-6 text-white" />
        <h3 class="mx-3 text-white font-semibold text-lg">
            {{ $podcast->title }}
        </h3>
    </div>
    <div class="py-4 px-6">
        @if ($podcast->body)
            <div class="py-2 text-lg text-gray-700">
                {!! $podcast->body !!}
            </div>
        @endif
        <a href="{{ route('click:track', $podcast->clicks->uuid) }}" class="flex items-center mt-4 text-gray-700 cursor-pointer">
            <x-icon-link-external class="h-6 w-6" />
            <p class="px-2 text-sm">
                {{ $podcast->external_url }}
            </p>
        </a>
    </div>
</div>
