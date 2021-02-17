@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center">
        <h1>Update Add On name - {{ $addon->name }}</h1>
        <hr>
    </div>
    <form action="/admin/addons/update" method="post">
        @csrf
        <div class="row text-center">
            <div class="col m-2">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <label for="name" class="input-group-text">New Add On Name</label>
                    </div>
                    <input class="form-control" type="text" name="name" id="name" value="{{ $addon->name }}" aria-label="Recipient's ">
                </div>
            </div>
        </div>
        <button class="btn btn-warning m-2" name="id" value="{{ $addon->id }}" type="Submit">Update add on</button>
    </form>
    <form action="/admin/addons/delete" method="post">
        @csrf
        <button class="btn btn-danger m-2" name="id" value="{{ $addon->id }}" type="Submit">Delete add on</button>
    </form>
</div>
@endsection
