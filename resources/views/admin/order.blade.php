@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">{{ __('Order') }} on {{ $order->created_at }}</h1>
    <hr>
    <div class="row">
        <div class="col-sm text-center">
            <h4><strong>Orderer</strong> - {{ $order->orderer }}</h4>
            <h5><strong>Description</strong> - {{ $order->description }}</h5>
            <h5><strong>Where to eat</strong> - {{ $order->wheretoeat }}</h5>
        </div>
        <div class="col-sm text-center">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Add Ons</h5>
                    <hr>
                    <ul class="list-unstyled">
                    @foreach ($addons as $addon)
                        @foreach ($orderAddons as $oa)
                            @if ($oa->addonId == $addon->id)
                                <li>{{ $addon->name }}</li>
                            @endif
                        @endforeach
                    @endforeach
                </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center">
        <hr>
        <h3>Food</h3>
        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th>Food</th>
                    <th>Qte</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody id="foods">
                @foreach ($foods as $food)
                    @foreach ($orderFoods as $of)
                        @if ($of->foodId == $food->id)
                            <tr>
                                <td>{{ $food->name }}</td>
                                <td>{{ $of->qte }}</td>
                                <th>{{ $food->price }}</th>
                            </tr>
                        @endif
                    @endforeach
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3" id="tot"><h5><strong>Total - {{ $order->sum }} DH</strong></h5></th>
                </tr>
            </tfoot>
        </table>
        <hr>
        <form action="/admin/ordersdone" method="post">
            @csrf
            <input type="number" name="order" value="{{ $order->id }}" hidden>
            <button class="btn btn-success" type="submit">Order Done</button>
        </form>
    </div>
</div>
@endsection
