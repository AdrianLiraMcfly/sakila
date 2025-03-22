@extends('adminlte::auth.auth-page', ['auth_type' => 'login'])

@section('auth_body')
    <p class="text-center">Introduce el código enviado a tu correo</p>

    <form action="{{ route('2fa.verify') }}" method="POST">
        @csrf

        <div class="input-group mb-3">
            <input type="text" name="code" class="form-control" placeholder="Código de verificación" required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-key"></span>
                </div>
            </div>
            @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
        </div>

        <button type="submit" class="btn btn-primary btn-block">Verificar</button>
    </form>
@endsection
