@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid">

            @if(session()->has('success'))
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Completado!</strong> {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            @endif

            <div class="row">
                <div class="offset-md-2 col-md-4">
                    <div class="card mt-5">
                        <div class="card-header">Actualizar mis datos</div>

                        <div class="card-body col-8 offset-2">
                            <form method="POST" action="{{ route('account.update', Auth::user()->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="form-group row mt-4">
                                    <label for="name" class="col-form-label text-md-right">Nombre</label>

                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{ Auth::user()->name }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group row mt-4">
                                    <label for="email" class="col-form-label text-md-right">Correo electrónico</label>

                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ Auth::user()->email }}" required autocomplete="email">

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
                                            Modificar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                </div>
            </div>
        </div>
    </div>
@endsection
