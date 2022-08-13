@extends('layouts/app')

@section('content')

        @component('components/nav')
        @endcomponent

    <h1>Add product</h1>

    @if($errors->any())
    
        @component('components/alert')
            @slot('type') danger @endslot
            <ul style = "margin-bottom:0;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        @endcomponent

    @endif

    @if($flash = session('message'))

        @component('components/alert')
            @slot('type') success @endslot
            {{ $flash }}
        @endcomponent

    @endif

    <form method="post" action="{{ url('/home/store') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Product name</label>
            <input value="{{ old('name') }}" type="text" class="form-control" id="name" name="name" aria-describedby="namehelp">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Product description</label></br>
            <textarea name="description" class="form-control" id="description" name="description" cols="40" rows="4">{{ old('description') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Product price in €</label>
            <input value="{{ old('price') }}" type="text" class="form-control" id="price" name="price" placeholder="12.44" aria-describedby="namehelp">
        </div>

        <div class="mb-3">
            <label for="images[]" class="form-label">Product images (only jpg or png)</label>
            <input type="file" class="form-control" id="images[]" name="images[]" aria-describedby="namehelp" multiple>
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select id="category" class="form-select" name="category">
                <option value="" hidden disabled selected>Category</option>
                <option value="Games">Games</option>
                <option value="Muziek">Muziek</option>
                <option value="Voertuigen">Voertuigen</option>
                <option value="Boeken">Boeken</option>
                <option value="Sport">Sport</option>
                <option value="Tuin">Tuin</option>
                <option value="Verzamelen">Verzamelen</option>
                <option value="Kleding">Kleding</option>
                <option value="Elektronische apparatuur">Elektronische apparatuur</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Add product</button>
    </form>

@endsection