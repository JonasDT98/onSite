@extends('layouts/app')


@section('content')
<h2>Log in</h2>
@if($flash = session('message'))

        @component('components/alert')
            @slot('type') danger @endslot
            {{ $flash }}
        @endcomponent

    @endif
    <form method="post" action="{{ url('/login') }}">
        @csrf
        
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
        </div>
        <!-- <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="remember">
            <label class="form-check-label" for="remember">Remember me</label>
        </div> -->
        <button type="submit" class="btn btn-primary">Log in</button>
    </form>
    <a href="/register">No account yet?</a>
@endsection