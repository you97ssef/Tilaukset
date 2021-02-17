@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center">
        <h1>New Category</h1>
        <hr>
    </div>
    <form action="/admin/categories/insert" method="post">
        @csrf
        <div class="row text-center">
            <div class="col m-2">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <label for="name" class="input-group-text">Category Name</label>
                    </div>
                    <input class="form-control" type="text" name="name" id="name" placeholder="Kebab..." aria-label="Recipient's ">
                </div>
            </div>
        </div>
        <button class="btn btn-success m-2" type="Submit">Add new category</button>
    </form>
</div>
@endsection
