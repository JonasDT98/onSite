@extends('layouts/app')

@section('content')
    @component('components/nav')
    @endcomponent
    <h1>{{$user->name}} {{$user->lastname}}</h1>
    <p>{{$user->email}}</p>
    <p>{{$user->profile_picture}}</p>
@endsection