<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            <div class="container text-center">
                <h1>{{ __('Make your order') }}</h1>
                <hr>
                <div class="row m-2">
                    <div class="input-group m-2">
                        <div class="input-group-prepend">
                            <label for="categorie" class="input-group-text">Categorie</label>
                        </div>
                        <select class="form-control" id="categorie">
                            <option value="ch" hidden>Choose a categorie...</option>
                            @foreach ($categories as $categorie)
                                <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row m-2">
                    <div class="input-group m-2">
                        <div class="input-group-prepend">
                            <label for="food" class="input-group-text">Food</label>
                        </div>
                        <select class="form-control" id="food">
                            <option value="ch" hidden>Choose a Food...</option>
                            @foreach ($foods as $food)
                                <option value="{{ $food->id }}">{{ $food->name }}</option>
                            @endforeach
                        </select>
                        <div class="input-group-append">
                            <input class="form-control" type="number" id="qte" name="qte" value="1" placeholder="Qte">
                        </div>
                    </div>
                </div>
                <div class="row m-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add Ons</h5>
                            <div class="card-text" id="ads">
                                @foreach ($addons as $addon)
                                <div class="form-check">
                                    <input id="in{{ $addon->id }}" class="form-check-input" type="checkbox" value="{{ $addon->id }}">
                                    <label for="in{{ $addon->id }}" class="form-check-label">{{ $addon->name }}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-secondary btn-sm" id="Add" type="button">Add Food To Order</button>
                <form action="/orderconfirm" method="post">
                    @csrf
                    <div class="row m-4">
                        <table class="table table-light">
                            <thead class="thead-light">
                                <tr>
                                    <th>Food</th>
                                    <th>Qte</th>
                                    <th>Addons</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody id="foods">
                                
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="4" id="tot">Total : 0 DH</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="input-group m-4">
                        <div class="input-group-prepend">
                            <label for="orderer" class="input-group-text">Name</label>
                        </div>
                        <input id="orderer" class="form-control" type="text" name="orderer" placeholder="Your Name..." required>
                    </div>
                    <div class="input-group m-4">
                        <div class="input-group-prepend">
                            <label for="descorder" class="input-group-text">Description</label>
                        </div>
                        <textarea class="form-control" name="descorder" id="descorder" rows="2" placeholder="Description"></textarea>
                    </div>
                    <div class="input-group m-4">
                        <div class="input-group-prepend">
                            <label for="wte" class="input-group-text">Wehre to eat</label>
                        </div>
                        <select class="form-control" id="wte" name="wte">
                            <option value="emporting">Emporting</option>
                            <option value="ontable">On Table</option>
                        </select>
                    </div>
                    <button class="btn btn-success" id="sub" type="submit" style="display: none;">Submit Order</button>
                </form>
            </div>
        </main>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        foos = '';
        var foods = [];
        @foreach ($foods as $food)
        foods.push({id : {{ $food->id }}, name : '{{ $food->name }}', price : '{{ $food->price }}', cat : {{ $food->categorieId }}}); 
        @endforeach
        var addons = [];
        @foreach ($addons as $addon)
        addons.push({id : {{ $addon->id }}, name : '{{ $addon->name }}'}); 
        @endforeach
        var orderaddon = [];
        var prices = 0;
        $(document).ready(function () {
            cats = $('#categorie').html();
            foos = $('#food').html();
            $('.form-check-input').click(function(){
                if($(this).is(":checked")){
                    orderaddon.push($(this).val());
                }
                else if($(this).is(":not(:checked)")){
                    if (orderaddon.indexOf($(this).val()) > -1) {
                        orderaddon.splice(orderaddon.indexOf($(this).val()), 1);
                    }
                }
            });
            $('#categorie').on('change',function(){
                $('#food').html('<option value="ch" hidden="">Choose a Food...</option>');
                for (food of foods) {
                    if(food.cat == $('#categorie').val()){
                        $('#food').html($('#food').html() + '<option value="' + food.id + '">' + food.name + '</option>');
                    }
                }
            });
            $('#Add').click(function () {
                if ($('#food').val() != 'ch') {
                    for (food of foods) {
                        if(food.id == $('#food').val()){
                            row = '<tr>';
                                row += '<td>';
                                    row += '<input type="number" name="food[]" value="' + food.id + '" hidden>'
                                    row += food.name;
                                row += '</td>';
                                row += '<td>';
                                    row += '<input type="number" name="qte[]" value="' + $('#qte').val() + '" hidden>'
                                    row += $('#qte').val();
                                row += '</td>';
                                row += '<td>';
                                    for (addon of orderaddon) {
                                        row += '<input type="number" name="addons[]" value="' + addon + '" hidden> '
                                        for(ad of addons){
                                            if(ad.id == addon){
                                                row += ad.name + ' ';
                                            }
                                        }
                                    }
                                row += '</td>';
                                row += '<th>';
                                    row += food.price * $('#qte').val();
                                    prices += food.price * $('#qte').val();
                                row += '</th>';
                            row += '</tr>';
                            $('#foods').html($('#foods').html() + row);
                        }
                    }
                    $('#tot').text('Total : ' + prices +' DH');
                    $('#categorie').val('ch');
                    $('#food').html(foos);
                    $(".form-check-input").prop("checked", false);
                    $('#sub').show();
                    orderaddon = [];
                }
            });
        });
    </script>
</body>
</html>

