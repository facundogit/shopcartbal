@extends('layout')
@section('title', 'Restauración de Contraseña')
@section('content')
<div class="container">
    <div class="auth-pages">
        <div class="auth-left">
            @if (session()->has('status'))
            <div class="alert alert-success">
                {{ session()->get('status') }}
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
            <h2>¿Olvido la Contraseña?</h2>
            <div class="spacer"></div>
            <form action="{{ route('password.email') }}" method="POST">
                {{ csrf_field() }}
                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
                <div class="login-container">
                    <button type="submit" class="auth-button">Enviar Link de Restauración</button>
                </div>


            </form>
        </div>
        <div class="auth-right">
            <h2>Restauración de Contraseña</h2>
            <div class="spacer"></div>
            <p></p>
           
        </div>
    </div>
</div>
@endsection

