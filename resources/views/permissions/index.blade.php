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
                    <div class="panel-heading">
                        <div class="row fa-align-center">
                            <div class="col-xs-6"><h5>Permisos</h5></div>
                            <div class="col-xs-6 text-right">
                                <a href="{{ url('/permissions/create') }}" class="btn btn-success">Nuevo Permiso
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @foreach($permissions as $permission)
                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-block">
                                        <h4 class="card-title">{{ $permission->name }}</h4>
                                        <hr>
                                        <div class="text-center">
                                            <a href="{{ url('permissions/'.$permission->id.'/permissions') }}"
                                               class="btn btn-warning">
                                                <i class="fa fa-id-card"></i>
                                            </a>
                                            <a href="{{ url('permissions/'.$permission->id.'/edit') }}"
                                               class="btn btn-primary">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <button class="btn btn-danger"
                                                    data-action="{{ url('/permissions/'.$permission->id) }}"
                                                    data-name="{{ $permission->name }}"
                                                    data-toggle="modal"
                                                    data-target="#confirm-delete{{$permission->id}}">
                                                <i class="fa fa-trash fa-1x"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-sm-12 text-center">
                            <tr>
                                <td colspan="3" class="text-center">
                                    {{ $permissions->links() }}
                                </td>
                            </tr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach($permissions as $permission)
        <div class="modal fade" id="confirm-delete{{$permission->id}}" tabindex="-1"
             role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    </div>
                    <div class="modal-body">
                        <p>¿Seguro que desea eliminar este
                            registro?</p>
                        <p class="name">{{ $permission->name }}</p>
                    </div>
                    <div class="modal-footer">
                        <form class="form-inline form-delete"
                              role="form"
                              method="POST"
                              action="{{ url('/permissions/'.$permission->id) }}">
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
