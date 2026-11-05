@extends('layouts.app_auth')

@section('content')
<div class="register-box">
  <!-- Logo Minimalista -->
  <div class="register-logo text-center mb-4">
    <a href="{{ url('/') }}">
      <img src="{{ asset('uploads/company/logo.png') }}" 
           alt="Logo Proyectos y Empleados" 
           style="max-width: 190px; height: auto; display: block; margin: 0 auto;">
    </a>
  </div>

  <div class="card border-0 shadow-sm rounded-lg">
    <div class="card-body register-card-body p-4">
      <h5 class="text-center font-weight-bold mb-4 text-dark">Registrar Nueva Cuenta</h5>

      <form action="{{ route('register') }}" method="POST">
        @csrf

        <!-- Nombre Completo -->
        <div class="input-group mb-3">
          <input id="name" type="text" class="form-control rounded-left @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nombre completo">
          <div class="input-group-append">
            <div class="input-group-text bg-white border-left-0">
              <span class="fas fa-user text-muted"></span>
            </div>
          </div>
          @error('name')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>

        <!-- Correo Electrónico -->
        <div class="input-group mb-3">
          <input id="email" type="email" class="form-control rounded-left @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Correo electrónico">
          <div class="input-group-append">
            <div class="input-group-text bg-white border-left-0">
              <span class="fas fa-envelope text-muted"></span>
            </div>
          </div>
          @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>

        <!-- Contraseña -->
        <div class="input-group mb-3">
          <input id="password" type="password" class="form-control rounded-left @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Contraseña">
          <div class="input-group-append">
            <div class="input-group-text bg-white border-left-0">
              <span class="fas fa-lock text-muted"></span>
            </div>
          </div>
          @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>

        <!-- Confirmar Contraseña -->
        <div class="input-group mb-3">
          <input id="password-confirm" type="password" class="form-control rounded-left" name="password_confirmation" required autocomplete="new-password" placeholder="Repetir contraseña">
          <div class="input-group-append">
            <div class="input-group-text bg-white border-left-0">
              <span class="fas fa-lock text-muted"></span>
            </div>
          </div>
        </div>

        <!-- Términos de uso -->
        <div class="mb-4">
          <div class="icheck-primary">
            <input type="checkbox" id="agreeTerms" name="terms" value="agree" required>
            <label for="agreeTerms" class="text-muted font-weight-normal small">
              Acepto los <a href="#" class="text-primary">términos y condiciones</a>
            </label>
          </div>
        </div>

        <!-- Botón de Registro Minimalista -->
        <button type="submit" class="btn btn-primary btn-block font-weight-bold py-2 rounded mb-3">
          Crear cuenta
        </button>
      </form>

      <!-- Enlace limpio para ir al Login -->
      <div class="text-center mt-3 pt-2 border-top">
        <a href="{{ route('login') }}" class="text-muted small">
          ¿Ya tienes una cuenta? <span class="text-primary font-weight-bold">Iniciar sesión</span>
        </a>
      </div>

    </div>
  </div>
</div>
@endsection