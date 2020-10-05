<x-app-container>
    <section class="mb-12">
        <h2 class="text-2xl leading-9 tracking-tight font-semibold text-gray-900 sm:text-3xl sm:leading-10">
            Latest News
        </h2>
        <div class="mt-6 grid gap-16 border-t-2 border-gray-100 pt-3 lg:grid-cols-2 lg:gap-x-5 lg:gap-y-12">
            @foreach ($articles as $article)
                <div>
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
                                <time datetime="{{ optional($article->publish_date)->format('Y-m-d') ?? $article->created_at->format('Y-m-d') }}">
                                    {{ optional($article->publish_date)->diffForHumans() ?? $article->created_at->diffForHumans() }}
                                </time>
                                <span class="mx-1">
                                  ·
                                </span>
                                <span>
                                  {{ $article->time_to_read }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</x-app-container>
