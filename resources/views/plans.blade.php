@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-plain">
                        <div>
                            <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#modalCreatePlan">Agregar plan
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Titulo</th>
                                        <th>Precio</th>
                                        <th>Tiempo</th>
                                        <th>Descripción</th>
                                        <th class="text-right">Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($plans as $plan)
                                        <tr>
                                            <td>{{ $plan->title }}</td>
                                            <td>{{ $plan->price }}</td>
                                            <td>{{ $plan->days }}</td>
                                            <td>{{ $plan->desc }}</td>
                                            <td class="td-actions text-right">
                                                <button type="submit" form="form-{{$plan->id}}" rel="tooltip" title="Borrar"
                                                        class="btn btn-danger btn-round">
                                                    <i class="material-icons">close</i>
                                                </button>
                                                <form id="form-{{$plan->id}}" action="{{route('plans.destroy', $plan->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal" tabindex="-1" role="dialog" id="modalCreatePlan">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="POST" action="{{ route('plans.store') }}" autocomplete="off">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div class="form-group row mt-4">
                                    <label for="title" class="col-form-label text-md-right">Titulo</label>
                                    <input id="title" type="text" class="form-control" name="title" required>
                                </div>

                                <div class="form-group row mt-4">
                                    <label for="price" class="col-form-label text-md-right">Precio</label>
                                    <input id="price" type="number" class="form-control" name="price" required value="0" min="0">
                                </div>

                                <div class="form-group row mt-4">
                                    <label for="price" class="col-form-label text-md-right">Tiempo de almacenamiento</label>
                                    <select class="form-control" name="days">
                                        @foreach($days as $day)
                                            <option value="{{$day[0]}}">{{$day[1]}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group row mt-4">
                                    <label for="desc" class="col-form-label text-md-right">Descripción</label>
                                    <textarea id="desc" class="form-control" name="desc" rows="2"></textarea>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Guardar</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('[name="file"]').change(function () {
                $('#formLoadFile').submit();
            });
        });

        function buscar() {
            $('[name="file"]').click();
        }
    </script>
@endsection
