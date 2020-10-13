<div>
    @forelse($feeds as $feed)
        <div class="bg-white shadow-md rounded-md">
            <div class="py-4 px-6">
                <a href="{{ route('users:feed', [$profile->slug, $feed->uuid]) }}" class="flex items-center mt-4 text-gray-700 cursor-pointer">
                    <x-icon-link-external class="h-6 w-6" />
                    <p class="px-2 text-sm">
                        {{ $feed->url }}
                    </p>
                </a>
            </div>
        </div>
    @empty
        <p>{{ $profile->user->name }} has not registered any feeds yet</p>
    @endforelse
</div>
