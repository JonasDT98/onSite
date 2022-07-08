@extends('layouts/app')

@section('content')

    <h1>Profile page</h1>

    <ul>
        @foreach($users as $user)
        <li>{{ $user->firstname}}  {{$user->lastname}}</li>
        @endforeach
    </ul>

@endsection