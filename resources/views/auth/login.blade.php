@extends('layouts.login')

@section('content')
<form class="pt-3" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
    @csrf
    <div class="form-group">
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} form-control-lg"
            name="email" value="{{ old('email') }}" placeholder="Correo Electrónico" required autofocus>

        @if ($errors->has('email'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
    </div>
    <div class="form-group">
        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} form-control-lg"
            name="password" required placeholder="Contraseña">

        @if ($errors->has('password'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
        @endif
    </div>
    <div class="mt-3">
        <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">
            INICIA
            SESIÓN
        </button>
    </div>
    <div class="my-2 d-flex justify-content-between align-items-center">
        <div class="form-check">
            <label class="form-check-label text-muted">
                <input type="checkbox" class="form-check-input" name="remember" id="remember"
                    {{ old('remember') ? 'checked' : '' }}>
                Mantenerme conectado
            </label>
        </div>
        <a href="{{ route('password.request') }}" class="auth-link text-black">¿Se te
            olvidó tu contraseña?</a>
    </div>
</form>
@endsection
