<x-app-container>
<section>
    <h2 class="text-3xl leading-9 tracking-tight font-extrabold text-gray-900 sm:text-4xl sm:leading-10">
        Latest News
    </h2>
    <div class="mt-3 sm:mt-4 lg:grid lg:grid-cols-2 lg:gap-5 lg:items-center">
        <p class="text-xl leading-7 text-gray-500">

        </p>
    </div>
    <div class="mt-6 grid gap-16 border-t-2 border-gray-100 pt-10 lg:grid-cols-2 lg:gap-x-5 lg:gap-y-12">
        @foreach ($articles as $article)
            <div>
                <p class="text-sm leading-5 text-gray-500">
                    <time datetime="2020-03-16">
                        {{ optional($article->publish_date)->diffForHumans() ?? $article->created_at->diffForHumans() }}
                    </time>
                </p>
                <a href="{{ route('articles:show', [$article->slug]) }}" class="block">
                    <h3 class="mt-2 text-xl leading-7 font-semibold text-gray-900">
                        {{ $article->title}}
                    </h3>
                    <div class="mt-3 text-base leading-6 text-gray-500">
                        {!! $article->excerpt !!}
                    </div>
                </a>
{{--                <div class="mt-3">--}}
{{--                    <a href="#" class="text-base leading-6 font-semibold text-indigo-600 hover:text-indigo-500 transition ease-in-out duration-150">--}}
{{--                        Read full story--}}
{{--                    </a>--}}
{{--                </div>--}}
            </div>
        @endforeach
    </div>
</section>
</x-app-container>
