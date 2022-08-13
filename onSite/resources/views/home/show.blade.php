@extends('layouts/app')

@section('content')
    @component('components/nav')
    @endcomponent
    <h1>{{$product->name}}</h1>

    @foreach($product->picture as $p)
        <img src="{{$p->image}}" alt="{{$p->image}}">
    @endforeach

    <p>{{$product->description}}</p>
    <p><strong>€{{$product->price}}</strong></p>
    <h5>Categorie: {{$product->category}}</h3>

    <form method="post" action="/home/destroy/{{ $product->id }}">
        @csrf
        <input type="hidden" name="_method" Value="DELETE">
        <input type="submit" class="btn btn-danger" value="Delete product">
    </form>

    <a href="/home">TERUG</a>
@endsection