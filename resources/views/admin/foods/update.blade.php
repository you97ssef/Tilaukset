@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center">
        <h1>Update Category name - {{ $food->name }}</h1>
        <hr>
    </div>
    <form action="/admin/foods/update" method="post">
        @csrf
        <div class="row text-center">
            <div class="col m-2">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <label for="name" class="input-group-text">Food Name</label>
                    </div>
                    <input class="form-control" type="text" name="name" id="name" placeholder="Tacos dinde..." value="{{ $food->name }}">
                </div>
            </div>
        </div>
        <div class="row text-center">
            <div class="col m-2">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <label for="description" class="input-group-text">Description</label>
                    </div>
                    <textarea class="form-control" name="description" id="description" rows="2" placeholder="Description of the product...">{{ $food->description }}</textarea>
                </div>
            </div>
        </div>
        <div class="row text-center">
            <div class="col m-2">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <label for="price" class="input-group-text">Price</label>
                    </div>
                    <input class="form-control" type="text" name="price" id="price" value="{{ $food->price }}" placeholder="30.00">
                </div>
            </div>
        </div>
        <div class="row text-center">
            <div class="col m-2">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <label for="categorie" class="input-group-text">Categorie</label>
                    </div>
                    <select name="categorie" id="categorie" class="form-control">
                        <option value="null" hidden>Choose categorie</option>
                        @foreach ($categories as $categorie)
                            @if ($food->categorieId == $categorie->id)
                                <option value="{{ $categorie->id }}" selected>{{ $categorie->name }}</option>
                            @else
                                <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <button class="btn btn-warning m-2" name="id" value="{{ $food->id }}" type="Submit">Update Food</button>
    </form>
    <form action="/admin/foods/delete" method="post">
        @csrf
        <button class="btn btn-danger m-2" name="id" value="{{ $food->id }}" type="Submit">Delete Food</button>
    </form>
</div>
@endsection
