<div class="mb-4">
    <h3>{{ $item->title }}</h3>
    <p>{{ $item->website }}</p>
    <p>{{ $item->published_at->diffForHumans() }}</p>
    <p>{{ $item->url }}</p>
</div>
