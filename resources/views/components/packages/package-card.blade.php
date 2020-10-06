<div class="bg-white shadow-md rounded-md">
    <a href="{{ route('packages:show', $package->slug) }}" class="flex items-center px-6 py-3 bg-gray-900 cursor-pointer">
        <x-icon-packagist class="h-6 w-6 text-white fill-current" />
        <h3 class="mx-3 text-white font-semibold text-lg">
            {{ $package->title }}
        </h3>
    </a>
    <div class="py-4 px-6">
        <div class="py-2 text-lg text-gray-700">
            {!! $package->body !!}
        </div>
        <a href="{{ route('click:track', $package->clicks->uuid) }}" class="flex items-center mt-4 text-gray-700 cursor-pointer">
            <x-icon-link-external class="h-6 w-6" />
            <p class="px-2 text-sm">
                {{ $package->external_url }}
            </p>
        </a>
    </div>
</div>
