@extends('layouts/app')

@section('content')
    <h1>Add product</h1>

    <form method="post" action="{{ url('/home/store') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Product name</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="namehelp">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Product description</label></br>
            <textarea name="description" class="form-control" id="description" name="description" cols="40" rows="4"></textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Product price in €</label>
            <input type="text" class="form-control" id="price" name="price" placeholder="12.44" aria-describedby="namehelp">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Product images (only jpg or png)</label>
            <input type="file" class="form-control" id="image" name="image" aria-describedby="namehelp">
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

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Accept terms and conditions</label>
        </div>

        <button type="submit" class="btn btn-primary">Add product</button>
    </form>

@endsection