<div>
    <input wire:keyup="search" wire:model="search" class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">

    @if($search)
        <h6>Searching for: <em>{{ $search }}</em></h6>
    @endif
        @foreach($products as $product)
            <div>
                <a href="/home/{{ $product->id }}">{{ $product->name }}</a>
                <p>{{$product->description}}</p>
            </div>
        @endforeach
</div>
