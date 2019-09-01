@component('mail::message')
# Pedido Recibido

Gracias Por Su Compra.

**Numero De Pedido* {{ $order->id }}

**Correo** {{ $order->billing_email }}

**Cliente** {{ $order->billing_name }}

**Total del Pedido** ${{ round($order->billing_total / 100, 2) }}

**Productos**

@foreach ($order->products as $product)
Nombre: {{ $product->name }} <br>
Precio: ${{ round($product->price / 100, 2)}} <br>
Cantidad: {{ $product->pivot->quantity }} <br>
@endforeach

Puede obtener mas detalles sobre su pedido en nuestra web.

@component('mail::button', ['url' => 'http://shopcartbal.herokuapp.com', 'color' => 'green'])
Valla al Sitio
@endcomponent

Gracias por Elegirnos.

{{ config('app.name') }}
@endcomponent
