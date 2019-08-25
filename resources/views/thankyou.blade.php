@extends('layout')

@section('title', 'Thank You')

@section('extra-css')

@endsection

@section('body-class', 'sticky-footer')

@section('content')

   <div class="thank-you-section">
       <h1>Gracias por su compra</h1>
       <p>Se le ha enviado un mail de confirmación</p>
       <div class="spacer"></div>
       <div>
           <a href="{{ url('/') }}" class="button">Pagina de Inicio</a>
       </div>
   </div>




@endsection
