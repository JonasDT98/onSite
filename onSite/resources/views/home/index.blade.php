<h1>HOME PAGE</h1>

<ul>
    @foreach($products as $product)
    <li>{{ $product->name }}</li>
    @endforeach
</ul>
