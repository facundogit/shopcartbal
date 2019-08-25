@extends('layout')

@section('title', 'Login')

@section('content')
<div class="container">
    <div class="auth-pages">
        <div class="auth-left">
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
            <h2>Cliente Registrado</h2>
            <div class="spacer"></div>

            <form action="{{ route('login') }}" method="POST">
                {{ csrf_field() }}

                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
                <input type="password" id="password" name="password" value="{{ old('password') }}" placeholder="Contraseña" required>

                <div class="login-container">
                    <button type="submit" class="auth-button">Inicio</button>
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordar Contraseña
                    </label>
                </div>

                <div class="spacer"></div>

                <a href="{{ route('password.request') }}">
                    ¿Olvido su contraseña?
                </a>

            </form>
        </div>

        <div class="auth-right">
            <h2>Nuevo Cliente</h2>           
            <div class="spacer"></div>
            <p><strong>¿Primera vez que nos visita?</strong></p>
            <p>Cree una cuenta para confirmar sus pedidos.</p>
            <div class="spacer"></div>
            <a href="{{ route('register') }}" class="auth-button-hollow">Crea una cuenta</a>

        </div>
    </div>
</div>
@endsection
