<li class="relative col-span-1 flex shadow-sm rounded-md">
    <div class="flex-shrink-0 flex items-center justify-center w-16 bg-{{ $color ?? 'red-500' }} text-white text-sm leading-5 font-medium rounded-l-md">
        {{ $icon }}
    </div>
    <div class="flex-1 flex items-center justify-between border-t border-r border-b border-gray-200 bg-white rounded-r-md truncate">
        <div class="flex-1 px-4 py-2 text-sm leading-5 truncate">
            {{ $title }}
        </div>
    </div>
</li>
