@extends('layouts/app')

@section('content')

    <h1>Home</h1>

    <ul>
        @foreach($products as $product)
        <div><a href="/home/{{ $product->id }}">{{ $product->name }}</a></div>
        @endforeach
    </ul>
@endsection