@extends('layouts/app')

@section('content')
    @component('components/nav')
    @endcomponent
    <h1>{{$product->name}}</h1>

    <h2>Buy {{$product->name}}?</h2>
    <form class="pt-2" method="post" action="/home/selling/{{ $product->id }}">
        @csrf
        <input type="hidden" name="_method" Value="DELETE">
        <input type="submit" class="btn btn-primary" value="Buy product">
    </form>
    
@endsection