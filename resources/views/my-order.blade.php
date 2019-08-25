@extends('layout')

@section('title', 'Mi Pedido')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/algolia.css') }}">
@endsection

@section('content')

    @component('components.breadcrumbs')
        <a href="/">Inicio</a>
        <i class="fa fa-chevron-right breadcrumb-separator"></i>
        <span>Mi Pedido</span>
    @endcomponent

    <div class="container">
        @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <div class="products-section my-orders container">
        <div class="sidebar">

            <ul>
              <li><a href="{{ route('users.edit') }}">Mi Perfil</a></li>
              <li class="active"><a href="{{ route('orders.index') }}">Mis Pedidos</a></li>
            </ul>
        </div> <!-- end sidebar -->
        <div class="my-profile">
            <div class="products-header">
                <h1 class="stylish-heading">Pedido ID: {{ $order->id }}</h1>
            </div>

            <div>
                <div class="order-container">
                    <div class="order-header">
                        <div class="order-header-items">
                            <div>
                                <div class="uppercase font-bold">Pedido hecho</div>
                                <div>{{ presentDate($order->created_at) }}</div>
                            </div>
                            <div>
                                <div class="uppercase font-bold">Pedido ID</div>
                                <div>{{ $order->id }}</div>
                            </div><div>
                                <div class="uppercase font-bold">Total</div>
                                <div>{{ presentPrice($order->billing_total) }}</div>
                            </div>
                        </div>                        
                    </div>
                    <div class="order-products">
                        <table class="table" style="width:50%">
                            <tbody>
                                <tr>
                                    <td>Nombre</td>
                                    <td>{{ $order->user->name }}</td>
                                </tr>
                                <tr>
                                    <td>Dirección</td>
                                    <td>{{ $order->billing_address }}</td>
                                </tr>
                                <tr>
                                    <td>Ciudad</td>
                                    <td>{{ $order->billing_city }}</td>
                                </tr>
                                <tr>
                                    <td>Subtotal</td>
                                    <td>{{ presentPrice($order->billing_subtotal) }}</td>
                                </tr>                              
                                <tr>
                                    <td>Total</td>
                                    <td>{{ presentPrice($order->billing_total) }}</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div> <!-- end order-container -->

                <div class="order-container">
                    <div class="order-header">
                        <div class="order-header-items">
                            <div>
                                Productos
                            </div>

                        </div>
                    </div>
                    <div class="order-products">
                        @foreach ($products as $product)
                            <div class="order-product-item">
                                <div><img src="{{ productImage($product->image) }}" alt="Product Image"></div>
                                <div>
                                    <div>
                                        <a href="{{ route('shop.show', $product->slug) }}"><div class="product-name">{{ $product->name }}</div></a>
                                    </div>
                                    <div>{{ presentPrice($product->price) }}</div>
                                    <div>Cantidad: {{ $product->pivot->quantity }}</div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div> <!-- end order-container -->
            </div>

            <div class="spacer"></div>
        </div>
    </div>

@endsection

@section('extra-js')
    <!-- Include AlgoliaSearch JS Client and autocomplete.js library -->
    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <script src="{{ asset('js/algolia.js') }}"></script>
@endsection
