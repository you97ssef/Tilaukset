@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center">
        <h1>Foods</h1>
        <hr>
    </div>
    <div class="row text-center">
        <div class="col">
            @if(session('mssg') != '')
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>{{ session('mssg') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
        </div>
    </div>
    <div class="row text-center">
        <div class="col">
            <table class="table table-light table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Categorie</th>
                        <th>Update/Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($foods as $food)
                        <tr>
                            <th>{{ $food->id }}</th>
                            <td>{{ $food->name }}</td>
                            <td>{{ $food->description }}</td>
                            <th>{{ $food->price }}</th>
                            <td>@foreach ($categories as $categorie) @if ($categorie->id == $food->categorieId) {{ $categorie->name }} @endif @endforeach </td>
                            <td><a class="btn btn-sm btn-warning" href="/admin/foods/update/{{ $food->id }}">Update/Delete</a></td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="6"><a href="/admin/foods/create">Create new Food!</a></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

</div>
@endsection
