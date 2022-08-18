@extends('layouts/app')

@section('content')
    @component('components/nav')
    @endcomponent
    <h1>{{$product->name}}</h1>

    @if($flash = session('message'))

        @component('components/alert')
            @slot('type') danger @endslot
            {{ $flash }}
        @endcomponent

    @endif

    @foreach($product->picture as $p)
        <img style="width:320px;" src="{{asset('product_images/'.$p->image)}}" alt="{{$p->image}}">
    @endforeach

    <p>{{$product->description}}</p>
    <p><strong>€{{$product->price}}</strong></p>
    <h5>Categorie: {{$product->category}}</h3>

    <form class="pt-2" method="post" action="/home/selling/{{ $product->id }}">
        @csrf

        <input type="submit" class="btn btn-success" value="Buy product">
    </form>

    <form class="pt-2" method="get" action="/home/update/{{ $product->id }}">
        @csrf
        <input type="submit" class="btn btn-primary" value="Update product">
    </form>

    <form class="pt-2" method="post" action="/home/destroy/{{ $product->id }}">
        @csrf
        <input type="hidden" name="_method" Value="DELETE">
        <input type="submit" class="btn btn-danger" value="Delete product">
    </form>
    
@endsection