@extends('layouts/app')

@section('content')
    @component('components/nav')
    @endcomponent
    <h1>Profile</h1>

    <p>{{$user->firstname}}</p>
    <p>{{$user->email}}</p>
    <img src="{{$user->profile_picture}}" alt="profile picture">
@endsection