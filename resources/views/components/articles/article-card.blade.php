<div class="flex flex-col bg-white px-8 py-6 w-full mx-auto rounded-lg shadow-md hover:shadow-lg">
    <div class="flex justify-center items-center">
        <x-app-link
            href="{{ route('articles:' . $article->level) }}"
            title="See all {{ ucwords($article->level) }} articles"
            class="pb-6 border-b"
        >
            {{ ucwords($article->level) }}
        </x-app-link>
    </div>
    <div class="mt-4 h-24 flex items-center">
        <a class="text-lg text-gray-700 font-medium" href="{{ route('articles:show', [$article->slug]) }}">
            {{ $article->title}}
        </a>
    </div>
    <div class="flex justify-between items-center mt-4">
        <div class="flex items-center">
            <img
                src="{{ $article->submittedByUser->profile_photo_url }}"
                class="w-8 h-8 object-cover rounded-full" alt="avatar"
            />
            <a class="text-gray-700 text-sm mx-3" href="#">
                {{ $article->submittedByUser->name }}
            </a>
        </div>
        <time
            class="font-light text-sm text-gray-600"
            datetime="{{ optional($article->publish_date)->format('Y-m-d') ?? $article->created_at->format('Y-m-d') }}"
        >
            {{ optional($article->publish_date)->diffForHumans() ?? $article->created_at->diffForHumans() }}
        </time>
    </div>
</div>

