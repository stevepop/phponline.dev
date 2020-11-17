<ul class="relative z-0 divide-y divide-gray-200 border-b border-gray-200">

    @forelse($bookmarks as $bookmark)
        <livewire:dashboard.bookmark.item
            :bookmark="$bookmark"
        />
    @empty
        <li class="relative pl-4 pr-6 py-5 hover:bg-gray-50 sm:py-6 sm:pl-6 lg:pl-8 xl:pl-6">
            <div class="flex items-center justify-center space-x-4">
                Nothing to see here, please bookmark some content.
            </div>
        </li>
    @endforelse

</ul>
