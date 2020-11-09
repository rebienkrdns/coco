@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-plain">
                        <div>
                            <button type="button" class="btn btn-success pull-right" onclick="buscar()">Cargar archivo</button>
                            <form id="formLoadFile" action="{{ route('files.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="file" style="display: none">
                            </form>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Archivo</th>
                                        <th class="text-right">Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($files as $file)
                                        <tr>
                                            <td>{{ $file->file }}</td>
                                            <td class="td-actions text-right">
                                                <a href="{{ url('/file/'.$file->file) }}" target="_blank" rel="tooltip" title="Descargar"
                                                   class="btn btn-success btn-round mr-2">
                                                    <i class="material-icons">download</i>
                                                </a>
                                                <button type="submit" form="form-{{$file->id}}" rel="tooltip" title="Borrar"
                                                        class="btn btn-danger btn-round">
                                                    <i class="material-icons">close</i>
                                                </button>
                                                <form id="form-{{$file->id}}" action="{{route('files.destroy', $file->file)}}" method="post">
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
