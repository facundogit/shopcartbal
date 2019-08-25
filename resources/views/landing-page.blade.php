<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SHOP-CART</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat%7CRoboto:300,400,700" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

    </head>
    <body>
        <div id="app">
            <header class="with-background">
                <div class="top-nav container">
                    <div class="top-nav-left">
                        <div class="logo"><img src="/img/header.png" ></div>
                        {{ menu('main', 'partials.menus.main') }}
                    </div>
                    <div class="top-nav-right">
                        @include('partials.menus.main-right')
                    </div>
                </div> <!-- end top-nav -->
                <div class="hero container">
                    <div class="hero-copy" style="color: white">
                        <p>Shop-Cart es un trabajo realizado para la Practica Supervisada de Balbuena Facundo</p> 
                        <p>Es una aplicación web que contiene multiples productos, categorias y un carro de compras</p>                 
                        <div class="hero-buttons">
                            
                        </div>
                    </div> <!-- end hero-copy -->

                    <div class="hero-image">
                        <img src="img/utn.jpg" alt="hero image">
                    </div> <!-- end hero-image -->
                </div>
            </header>   
                                  
                   
                <!-- end hero -->

            <div class="featured-section">

                <div class="container">             
                  
                    {{-- <div class="tabs">
                        <div class="tab">
                            Favoritos
                        </div>
                        <div class="tab">
                            En Oferta
                        </div>
                    </div> --}}

                    <div class="products text-center">
                        @foreach ($products as $product)
                            <div class="product">
                                <a href="{{ route('shop.show', $product->slug) }}"><img src="{{ productImage($product->image) }}" alt="product"></a>
                                <a href="{{ route('shop.show', $product->slug) }}"><div class="product-name">{{ $product->name }}</div></a>
                                <div class="product-price">{{ $product->presentPrice() }}</div>
                            </div>
                        @endforeach

                    </div> <!-- end products -->

                    <div class="text-center button-container">
                        <a href="{{ route('shop.index') }}" class="button">Ver mas productos</a>
                    </div>

                </div> <!-- end container -->

            </div> <!-- end featured-section -->

            @include('partials.footer')

        </div> <!-- end #app -->
        <script src="js/app.js"></script>
    </body>
</html>
