@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center">
        <h1>Update Category name - {{ $category->name }}</h1>
        <hr>
    </div>
    <form action="/admin/categories/update" method="post">
        @csrf
        <div class="row text-center">
            <div class="col m-2">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <label for="name" class="input-group-text">New Category Name</label>
                    </div>
                    <input class="form-control" type="text" name="name" id="name" value="{{ $category->name }}" aria-label="Recipient's ">
                </div>
            </div>
        </div>
        <button class="btn btn-warning m-2" name="id" value="{{ $category->id }}" type="Submit">Update category</button>
    </form>
    <form action="/admin/categories/delete" method="post">
        @csrf
        <button class="btn btn-danger m-2" name="id" value="{{ $category->id }}" type="Submit">Delete category</button>
    </form>
</div>
@endsection
