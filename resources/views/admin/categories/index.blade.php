@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center">
        <h1>Categories</h1>
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
                        <th>Update/Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <th>{{ $category->id }}</th>
                            <td>{{ $category->name }}</td>
                            <td><a class="btn btn-sm btn-warning" href="/admin/categories/update/{{ $category->id }}">Update/Delete</a></td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3"><a href="/admin/categories/create">Create new category!</a></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

</div>
@endsection
