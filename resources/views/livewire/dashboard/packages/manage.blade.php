<x-app-container>
    <section class="mb-12">
        Add form
    </section>

    <section class="mb-12">
        <ul class="grid grid-cols-1 gap-6 sm:grid-cols-1 lg:grid-cols-2">
            @forelse($packages as $package)
                <x-app-manage-package-card
                    :package="$package"
                />
            @empty
                <li
                    class="w-full flex items-center justify-center px-4 py-3 text-lg text-gray-700"
                >
                    You have not yet added any packages, please add some.
                </li>
            @endforelse
        </ul>
    </section>

    <div class="mb-12">
        {{ $packages->links() }}
    </div>
</x-app-container>
