@extends('layouts/app')

@section('content')

        @component('components/nav')
        @endcomponent

    <h1>Update product</h1>

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
    <form method="post" action="/home/put/{{ $product->id }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Update product name</label>
            <input value="{{$product->name}}" type="text" class="form-control" id="name" name="name" aria-describedby="namehelp">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Update product description</label></br>
            <textarea name="description" class="form-control" id="description" name="description" cols="40" rows="4">{{$product->description}}</textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Update product price in €</label>
            <input value="{{$product->price}}" type="text" class="form-control" id="price" name="price" placeholder="12.44" aria-describedby="namehelp">
        </div>

        <div class="mb-3">
            <img style="width:320px;" src="{{asset('product_images/'.$picture->image)}}" alt="{{$picture->image}}"></br>
            <label for="files" class="form-label">Change product images (only jpg or png)</label>
            <input type="file" class="form-control" id="files" name="images[]" accept="image/*" multiple>
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Update category</label>
            <select id="category" class="form-select" name="category">
                <option value="{{$product->category}}" hidden selected>{{$product->category}}</option>
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
        <input type="hidden" name="_method" Value="PUT">
        <input type="submit" class="btn btn-primary" value="Update product">
    </form>

@endsection