@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center">
        <h1>Add Ons</h1>
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
                    @foreach ($addons as $addon)
                        <tr>
                            <th>{{ $addon->id }}</th>
                            <td>{{ $addon->name }}</td>
                            <td><a class="btn btn-sm btn-warning" href="/admin/addons/update/{{ $addon->id }}">Update/Delete</a></td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3"><a href="/admin/addons/create">Create new Add on!</a></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

</div>
@endsection