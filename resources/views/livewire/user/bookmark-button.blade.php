<div
    class="inline-flex space-x-3 cursor-pointer text-{{ isset($color) ? $color : 'white' }} hover:text-{{ isset($hover) ? $hover : 'gray-100' }}"
    wire:click="toggle"
>
    @if ($bookmarked)
        <span>Remove bookmark</span>
        <x-icon-bookmark-alt class="h-6 w-6" />
    @else
        <span>Bookmark</span>
        <x-icon-bookmark class="h-6 w-6" />
    @endif
</div>
