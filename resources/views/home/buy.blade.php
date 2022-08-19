@extends('layouts/app')

@section('content')
    @component('components/nav')
    @endcomponent
    <h1>ARE YOU SURE YOU WANT TO BUY THIS PRODUCT?</h1>
    @if($flash = session('message'))

    @component('components/alert')
        @slot('type') success @endslot
        {{ $flash }}
    @endcomponent

    @endif
    @foreach($product->picture as $p)
        <img style="width:320px;" src="{{asset('product_images/'.$p->image)}}" alt="{{$p->image}}">
    @endforeach
    <h3>{{$product->name}}</h3>
    <p>{{$product->description}}</p>
    <p><strong>€{{$product->price}}</strong></p>
    <h5>Categorie: {{$product->category}}</h3>

    <form class="pt-2 mb-2" method="post" action="/home/selling/{{ $product->id }}" enctype="multipart/form-data">
        @csrf
        <label for="sure" class="form-label">Yes i am sure to buy this product.</label></br>
        <input type="hidden" name="_method" Value="PUT">
        <input type="submit" name="sure" class="btn btn-success px-5" value="Buy">
    </form>

    <a class="btn btn-primary px-5" href="/home/{{ $product->id }}">Back</a>
    
@endsection