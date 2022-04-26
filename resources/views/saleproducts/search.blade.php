@if($products->isNotEmpty())
    @foreach ($products as $product)
        <div class="post-list">
            <p>{{ $product->name }}</p>
            <img src="{{ $product->image }}">
        </div>
    @endforeach
@else
    <div>
        <h2>No products found</h2>
    </div>
@endif
