@extends('layouts.app')

@section('content')
<div class="hold-transition login-page" style="background-color: #f4f6f9; height: 100vh; display: flex; justify-content: center; align-items: center;">
    <div class="login-box" style="width: 360px;">
        
        <!-- Tarjeta del Login con bordes redondeados y sombra elegante -->
        <div class="card card-outline card-primary" style="border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
            
            <div class="card-header text-center" style="border-bottom: none; background: white; border-top-left-radius: 10px; border-top-right-radius: 10px; padding-top: 30px;">
                <!-- Logo de tu restaurante -->
                <img src="{{ asset('uploads/company/logo.png') }}" alt="Logo" style="width: 70px; height: 70px; object-fit: contain; margin-bottom: 10px;">
                
                <!-- Títulos de bienvenida -->
                <h4 style="font-weight: 600; color: #333; margin-bottom: 2px;">Bienvenido de nuevo</h4>
                <p style="color: #777; font-size: 14px; margin-bottom: 0;">Inicia sesión para continuar</p>
            </div>

            <div class="card-body login-card-body" style="background: white; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; padding: 20px 30px 30px 30px;">
                
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Campo de Correo Electrónico -->
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Correo electrónico" value="{{ old('email') }}" required autocomplete="email" autofocus style="border-radius: 5px 0 0 5px;">
                        <div class="input-group-append">
                            <div class="input-group-text" style="border-radius: 0 5px 5px 0; background-color: #fff;">
                                <span class="fas fa-envelope text-muted"></span>
                            </div>
                        </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Campo de Contraseña -->
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Contraseña" required autocomplete="current-password" style="border-radius: 5px 0 0 5px;">
                        <div class="input-group-append">
                            <div class="input-group-text" style="border-radius: 0 5px 5px 0; background-color: #fff;">
                                <span class="fas fa-lock text-muted"></span>
                            </div>
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Fila de Recordar contraseña y Olvidaste tu contraseña -->
                    <div class="row mb-3 align-items-center">
                        <div class="col-6">
                            <div class="icheck-primary" style="font-size: 14px;">
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember" style="font-weight: normal; color: #555; cursor: pointer;">
                                    Recordarme
                                </label>
                            </div>
                        </div>
                        <div class="col-6 text-right">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" style="font-size: 13px; color: #007bff; text-decoration: none;">
                                    ¿Olvidaste tu contraseña?
                                }}</a>
                            @endif
                        </div>
                    </div>

                    <!-- Botón de Entrar -->
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block" style="border-radius: 5px; font-weight: 500; background-color: #0056b3; border-color: #0056b3;">
                                <i class="fas fa-sign-in-alt mr-1"></i> Entrar
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Enlace de registro inferior opcional -->
                <div class="text-center mt-4" style="font-size: 13px; color: #666;">
                    ¿No tienes cuenta? <a href="{{ route('register') }}" style="color: #007bff; font-weight: 500; text-decoration: none;">Regístrate</a>
                </div>

            </div>
        </div>
        
        <!-- Pie de página discreto -->
        <div class="text-center mt-3" style="font-size: 12px; color: #888;">
            © 2026 El Mirador del Sabor · Panel Administrativo
        </div>

    </div>
</div>
@endsection