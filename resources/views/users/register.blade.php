@extends('layouts/app')

@section('content')
    <form method="post" action="{{url('/register')}}">
        @csrf
        <h2>Register</h2>
        <div class="form-group">
            <label for="firstname">First name</label>
            <input type="text" class="form-control" id="firstname" name="firstname" aria-describedby="nameHelp" placeholder="Enter first name">
        </div>
        <div class="form-group">
            <label for="lastname">Last name</label>
            <input type="text" class="form-control" id="lastname" name="lastname" aria-describedby="lastnameHelp" placeholder="Enter last name">
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group mb-2">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
    <a href="index.php/login">Do you already have an account?</a>
@endsection