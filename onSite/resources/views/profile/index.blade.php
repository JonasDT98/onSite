@extends('layouts/app')

@section('content')
    @component('components/nav')
    @endcomponent
    <h1>Profiles</h1>

    <p>{{$user->firstname}}</p>
    <p>{{$user->email}}</p>
    <img style="width:180px;" class="rounded-circle" src="{{asset('profile_images/'.$user->profile_picture)}}" alt="profile picture">
    <form method="post" action="{{ url('/profile/store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="profileimage" class="form-label">Profile images (only jpg or png)</label>
            <input type="file" class="form-control" id="profileimage" name="profileimage[]" aria-describedby="namehelp" multiple>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection