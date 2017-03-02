@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('mensaje'))
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-info alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <strong>Info:</strong> {{ session('mensaje') }}.
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">records</div>

                    <div class="panel-body">
                        Listado de records
                        <a href="{{ url('/records/create') }}" class="btn btn-success">
                            <i class="fa fa-user"></i> Nuevo record
                        </a>


                        <table class="table table-bordered">
                            <tr>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th width="10%" colspan="2">Acciones</th>
                            </tr>
                            @foreach($records as $record)
                                <tr>
                                    <td>{{ $record->name }}</td>
                                    <td>{{ $record->description }}</td>
                                    <td>
                                        <a href="{{ url('records/'.$record->id.'/edit') }}" class="btn btn-primary">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger"
                                                data-action="{{ url('/records/'.$record->id) }}"
                                                data-name="{{ $record->name }}"
                                                data-toggle="modal" data-target="#confirm-delete{{$record->id}}">
                                            <i class="fa fa-trash fa-1x"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach($records as $record)
        <div class="modal fade" id="confirm-delete{{$record->id}}" tabindex="-1"
             role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    </div>
                    <div class="modal-body">
                        <p>¿Seguro que desea eliminar este
                            registro?</p>
                        <p class="name">{{ $record->name }}</p>
                    </div>
                    <div class="modal-footer">
                        <form class="form-inline form-delete"
                              role="form"
                              method="POST"
                              action="{{ url('/records/'.$record->id) }}">
                            {!! method_field('DELETE') !!}
                            {!! csrf_field() !!}
                            <button type="button"
                                    class="btn btn-default"
                                    data-dismiss="modal">Cancelar
                            </button>
                            <button id="delete-btn"
                                    class="btn btn-danger"
                                    title="Eliminar">Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
