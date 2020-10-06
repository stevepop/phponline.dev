<section class="mb-12">
    <h2 class="text-xl leading-9 tracking-tight font-semibold text-gray-900 sm:text-2xl sm:leading-10">
        Latest Open Source Packages
    </h2>
    <div class="mt-6 grid gap-16 border-t-2 border-gray-100 pt-3 lg:grid-cols-1 lg:gap-y-5">
        @foreach ($packages as $package)
            <x-app-package-card
                :key="$package->id"
                :package="$package"
            />
        @endforeach
    </div>
</section>
