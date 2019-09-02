<ul>

    @guest
    <li><a href="{{ route('login') }}">Inicio</a></li>
    <li><a href="{{ route('register') }}">Registro</a></li>       
    @if ($agent->isMobile())
        <li><a href="{{ route('mobile') }}">Descargas</a></li>
    @endif
    
    @else
    <li>
        <a href="{{ route('users.edit') }}">Mi Cuenta</a>
    </li>
    <li>
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
            Salir
        </a>
    </li>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
    @if ($agent->isMobile())
        <li><a href="{{ route('cart.index') }}">Carrito
        @if (Cart::instance('default')->count() > 0)
            <span class="cart-count"><span>{{ Cart::instance('default')->count() }}</span></span>
        @endif
    @endif
    @endguest

    @if ($agent->isDesktop())
        <li><a href="{{ route('cart.index') }}">Carrito
        <li><a href="{{ route('mobile') }}">Descargas</a></li>    
        @if (Cart::instance('default')->count() > 0)
            <span class="cart-count"><span>{{ Cart::instance('default')->count() }}</span></span>
        @endif
    @endif

    
   
    </a></li>
    {{-- @foreach($items as $menu_item)
        <li>
            <a href="{{ $menu_item->link() }}">
                {{ $menu_item->title }}
                @if ($menu_item->title === 'Cart')
                    @if (Cart::instance('default')->count() > 0)
                    <span class="cart-count"><span>{{ Cart::instance('default')->count() }}</span></span>
                    @endif
                @endif
            </a>
        </li>
    @endforeach --}}
</ul>
