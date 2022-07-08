@extends('layouts/app')

@section('content')

    @component('components/alert')
        @slot('type') success @endslot
        User name available.
    @endcomponent

    <h1>Login page</h1>

@endsection
