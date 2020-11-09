@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="@role('Cliente') offset-md-2 @endrole @role('Administrador') offset-md-4 @endrole col-md-4">
                    <div class="card mt-5">
                        <div class="card-header card-header-warning">
                            <h4 class="card-title ">Actualizar mis datos</h4>
                        </div>
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
                @role('Cliente')
                <div class="col-md-4">
                    <div class="card mt-5">
                        <div class="card-header card-header-success">
                            <h4 class="card-title ">Cambiar mi plan</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <tr>
                                        <th>
                                            Titulo
                                        </th>
                                        <th>
                                            Precio
                                        </th>
                                        <th>
                                            Tiempo de almacenamiento
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($plans as $plan)
                                        <tr>
                                            <td>
                                                @if(\App\Models\CustomerPlan::where('id_user', Auth::user()->id)->first()->id_time_lapse == $plan->id)
                                                    <span class="badge badge-success"><a class="text-white"
                                                                                         href="{{ url('account/plan/update') }}/{{ $plan->id }}">{{ $plan->title }}</a></span>
                                                @else
                                                    <span class="badge badge-info"><a class="text-white"
                                                                                      href="{{ url('account/plan/update') }}/{{ $plan->id }}">{{ $plan->title }}</a></span>
                                                @endif
                                            </td>
                                            <td>
                                                {{ $plan->price }}
                                            </td>
                                            <td>
                                                @switch($plan->days)
                                                    @case(7)
                                                    {{ "Una semana" }}
                                                    @break
                                                    @case(15)
                                                    {{ "Quince días" }}
                                                    @break
                                                    @case(30)
                                                    {{ "Un mes" }}
                                                    @break
                                                    @case(60)
                                                    {{ "Dos meses" }}
                                                    @break
                                                    @case(90)
                                                    {{ "Tres meses" }}
                                                    @break
                                                    @case(180)
                                                    {{ "Seis meses" }}
                                                    @break
                                                    @case(365)
                                                    {{ "Un año" }}
                                                    @break
                                                    @case(730)
                                                    {{ "Dos años" }}
                                                    @break
                                                    @case(1095)
                                                    {{ "Tres años" }}
                                                    @break
                                                @endswitch
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                @endrole
            </div>
        </div>
    </div>
@endsection
