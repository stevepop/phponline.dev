<x-app-layout>
    <x-app-header class="py-6 bg-gray-900 mb-12">
        <h2 class="text-3xl leading-9 font-semibold tracking-tight text-white md:text-4xl md:leading-10">
            <span class="block">
               Create Article
            </span>
        </h2>
    </x-app-header>
    <x-app-container>
        @livewire('articles.article-form')
    </x-app-container>
</x-app-layout>
