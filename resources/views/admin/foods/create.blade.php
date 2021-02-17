@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center">
        <h1>New Food</h1>
        <hr>
    </div>
    <form action="/admin/foods/insert" method="post">
        @csrf
        <div class="row text-center">
            <div class="col m-2">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <label for="name" class="input-group-text">Food Name</label>
                    </div>
                    <input class="form-control" type="text" name="name" id="name" placeholder="Tacos dinde..." aria-label="Food name">
                </div>
            </div>
        </div>
        <div class="row text-center">
            <div class="col m-2">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <label for="description" class="input-group-text">Description</label>
                    </div>
                    <textarea class="form-control" name="description" id="description" rows="2" placeholder="Description of the product..."></textarea>
                </div>
            </div>
        </div>
        <div class="row text-center">
            <div class="col m-2">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <label for="price" class="input-group-text">Price</label>
                    </div>
                    <input class="form-control" type="text" name="price" id="price" placeholder="30.00">
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
                            <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>    
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <button class="btn btn-outline-success m-2" type="Submit">Add new Food</button>
    </form>
</div>
@endsection
