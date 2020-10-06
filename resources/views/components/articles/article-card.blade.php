<div class="bg-white shadow-md px-4 py-3 rounded-md">
    <div>
        <a href="{{ route('articles:' . $article->level) }}" class="inline-block">
          <span
              class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium leading-5 bg-indigo-100 text-indigo-800">
            {{ ucwords($article->level) }}
          </span>
        </a>
    </div>
    <a href="{{ route('articles:show', [$article->slug]) }}" class="block">
        <h3 class="mt-2 text-xl leading-7 font-semibold text-gray-900">
            {{ $article->title}}
        </h3>
        <div class="mt-3 text-base leading-6 text-gray-500">
            {!! $article->excerpt !!}
        </div>
    </a>
    <div class="mt-6 flex items-center">
        <div class="flex-shrink-0">
            <a href="#">
                <img class="h-10 w-10 rounded-full border"
                     src="{{ $article->submittedByUser->profile_photo_url }}"
                     alt="">
            </a>
        </div>
        <div class="ml-3">
            <p class="text-sm leading-5 font-medium text-gray-900">
                <a href="#">
                    {{ $article->submittedByUser->name }}
                </a>
            </p>
            <div class="flex text-sm leading-5 text-gray-500">
                <time
                    datetime="{{ optional($article->publish_date)->format('Y-m-d') ?? $article->created_at->format('Y-m-d') }}">
                    {{ optional($article->publish_date)->diffForHumans() ?? $article->created_at->diffForHumans() }}
                </time>
                <span class="mx-1">
                  in
                </span>
                <span>
                  {{ $article->category->title }}
                </span>
            </div>
        </div>
    </div>
</div>
