@extends('layouts/app')

@section('content')

        @component('components/nav')
        @endcomponent

    <h1>Home</h1>

    
    <livewire:product-search />
    
@endsection