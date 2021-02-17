@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">{{ __('Orders') }}</h1>
    <hr>
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
    @foreach ($orders as $order)
        <div class="card m-4">
            <div class="card-body text-center">
                <h3 class="card-title">{{ $order->created_at }}</h3>
                <p class="card-text">{{ $order->orderer }} - <strong>{{ $order->sum }} DH</strong> - {{ $order->wheretoeat }}</p>
                <a class="btn btn-sm btn-outline-info" href="/admin/orders/{{ $order->id }}">See Order</a>
            </div>
        </div>
    @endforeach
</div>
<script>
    window.setTimeout(function () {
        window.location.reload();
    }, 30000);  
</script>
@endsection
