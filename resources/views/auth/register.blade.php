@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-4 mt-5">
                <div class="card mt-5">
                    <div class="card-header">Registro de clientes</div>

                    <div class="card-body col-8 offset-2">
                        <form method="POST" action="{{ url('customer/register') }}">
                            @csrf

                            <div class="form-group row mt-4">
                                <label for="name" class="col-form-label text-md-right">Nombre</label>

                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                       value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row mt-4">
                                <label for="email" class="col-form-label text-md-right">Correo electrónico</label>

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                       value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row mt-4">
                                <label for="password" class="col-form-label text-md-right">Contraseña</label>

                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                                       required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row mt-4">
                                <label for="password-confirm" class="col-form-label text-md-right">Confirme la contraseña</label>

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                                       autocomplete="new-password">
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col">
                                    <button type="submit" class="btn btn-success">
                                        Registrarme
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
