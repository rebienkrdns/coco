@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-5">
        <div class="row mt-5">

            @role('Cliente')
            <div class="col-lg-3 col-md-6 col-sm-6 mt-5">
                <div class="card card-stats">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">dashboard</i>
                        </div>
                        <p class="card-category">Archivos alojados</p>
                        <h3 class="card-title">{{ \App\Models\File::where('id_user', Auth::user()->id)->count() }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 mt-5">
                <div class="card card-stats">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">content_paste</i>
                        </div>
                        <p class="card-category">Plan actual</p>
                        <h3 class="card-title">{{ \App\Models\CustomerPlan::where('id_user', Auth::user()->id)->join('time_lapses', 'customer_plan.id_time_lapse', 'time_lapses.id')->first()->title }}</h3>
                    </div>
                </div>
            </div>
            @endrole

            @role('Administrador')
            <div class="col-lg-3 col-md-6 col-sm-6 mt-5">
                <div class="card card-stats">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">library_books</i>
                        </div>
                        <p class="card-category">Clientes registrados</p>
                        <h3 class="card-title">{{ \App\User::where('roles.name', 'Cliente')->join('model_has_roles', 'users.id', 'model_has_roles.model_id')->join('roles', 'model_has_roles.role_id', 'roles.id')->count() }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 mt-5">
                <div class="card card-stats">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">content_paste</i>
                        </div>
                        <p class="card-category">Planes actuales</p>
                        <h3 class="card-title">{{ \App\Models\TimeLapse::count() }}</h3>
                    </div>
                </div>
            </div>
            @endrole

        </div>
    </div>
@endsection
