<div {{ $attributes }}>
    <div class="max-w-screen-xl mx-auto py-12 px-4 sm:px-6 lg:py-24 lg:px-8 lg:flex lg:items-center lg:justify-between">
        <h2 class="text-2xl leading-9 font-semibold tracking-tight text-gray-700 md:text-3xl md:leading-10">
            <span class="block">{{ $message }}</span>
            <span class="block text-gray-900">{{ $text }}</span>
        </h2>
        @isset($actions)
            {{ $actions }}
        @endisset
    </div>
</div>
