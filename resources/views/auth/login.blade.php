@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-4 mt-5">
                    <div class="card mt-5">
                        <div class="card-header"><strong>Inicio de sesión</strong></div>

                        <div class="card-body col-8 offset-2">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group row mt-4">
                                    <label for="email" class="col-form-label text-md-right">Correo electrónico</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group row mt-4">
                                    <label for="password" class="col-form-label text-md-right">Contraseña</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                           name="password" required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-check mt-4">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="remember"
                                               id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        Recordarme
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>

                                <div class="form-group row mb-0 mt-5">
                                    <div class="col">
                                        <button type="submit" class="btn btn-success">
                                            Iniciar sesión
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
