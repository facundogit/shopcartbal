@extends('layout')

@section('title', 'Registro de Cuenta')

@section('content')
<div class="container">
    <div class="auth-pages">
        <div>
            @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
            @endif @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <h2>Registro de Cuenta</h2>
            <div class="spacer"></div>

            <form method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}

                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nombre" required autofocus>

                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required>

                <input id="password" type="password" class="form-control" name="password" placeholder="Contraseña" placeholder="Contraseña" required>

                <input id="password-confirm" type="password" class="form-control" name="Confirme Contraseña" placeholder="Confirme Contraseña"
                    required>

                <div class="login-container">
                    <button type="submit" class="auth-button">Crear Cuenta</button>
                    <div class="already-have-container">
                        <p><strong>¿Ya tiene cuenta?</strong></p>
                        <a href="{{ route('login') }}">Inicio</a>
                    </div>
                </div>

            </form>
        </div>

        <div class="auth-right">
            <h2>Nuevo Cliente</h2>
            <div class="spacer"></div>
            <p><strong>Inscribase</strong></p>
            <p>Crear una cuenta le permite chequear su historial de pedidos y modificar su perfil.</p>
            
        </div>
    </div> <!-- end auth-pages -->
</div>
@endsection
