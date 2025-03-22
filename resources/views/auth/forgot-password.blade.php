@extends('adminlte::auth.auth-page', ['auth_type' => 'login'])

@section('auth_body')
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Recuperar</b> Contraseña</a>
    </div>
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Ingresa tu correo para recibir un código de recuperación</p>

            <form action="{{ route('password.sendResetCode') }}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Correo electrónico" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-block">Enviar Código</button>
            </form>
        </div>
    </div>
</div>
@endsection