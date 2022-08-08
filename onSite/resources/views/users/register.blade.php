@extends('layouts/app')

@section('content')
    <form method="post" action="{{url('/register')}}">
        @csrf
        <h2>Register</h2>
        <div class="form-group">
            <label for="firstname">Firstname</label>
            <input type="text" class="form-control" id="firstname" name="firstname" aria-describedby="nameHelp" placeholder="Enter Firstname">
        </div>
        <div class="form-group">
            <label for="lastname">Lastname</label>
            <input type="text" class="form-control" id="lastname" name="lastname" aria-describedby="lastnameHelp" placeholder="Enter lastname">
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
    <a href="/login">Already a account?</a>
@endsection