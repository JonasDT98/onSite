@extends('layouts/app')

@section('content')
    <h1>{{$product->name}}</h1>

    @foreach($product->picture as $p)
        <img src="{{$p->image}}" alt="{{$p->image}}">
    @endforeach

    <p>{{$product->description}}</p>
    <p><strong>€{{$product->price}}</strong></p>
    <h5>Categorie: {{$product->category}}</h3>
    <a href="/home">TERUG</a>
@endsection