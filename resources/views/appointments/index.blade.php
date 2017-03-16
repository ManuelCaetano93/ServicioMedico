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
                        <div class="row">
                            <div class="col-xs-4"><h5>Citas</h5></div>
<<<<<<< HEAD
                            <div class="col-xs-6 text-right">
                                <a href="{{ url('users/'.$user.'/appointment') }}" class="btn btn-success">Nueva Cita
=======
                            <div class="col-xs-8 text-right">
                                <a href="{{ url('/appointments/create') }}" class="btn btn-success">Nueva Cita
>>>>>>> Dev_sabina
                                </a>
                                <a href="{{ url('/appointment/deleted') }}" class="btn btn-success">Recuperar
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if($appointments->status = 'Active')
                            @foreach($appointments as $appointment)
                                <div class="col-sm-4">
                                    <div class="card">
                                        <div class="card-block">
                                            <h4 class="card-title">{{ $appointment->name }}</h4>
                                            <hr>
                                            <div class="text-center">
                                                <a href="{{ url('appointments/'.$appointment->id.'/edit') }}"
                                                   class="btn btn-primary">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <button class="btn btn-danger"
                                                        data-action="{{ url('/appointments/'.$appointment->id) }}"
                                                        data-name="{{ $appointment->name }}"
                                                        data-toggle="modal"
                                                        data-target="#confirm-delete{{$appointment->id}}">
                                                    <i class="fa fa-trash fa-1x"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <tr>
                        <td colspan="7" class="text-center">
                            {{ $appointments->links() }}
                        </td>
                    </tr>
                </div>
            </div>
        </div>
    </div>
    </div>
    @foreach($appointments as $appointment)
        <div class="modal fade" id="confirm-delete{{$appointment->id}}" tabindex="-1"
             role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    </div>
                    <div class="modal-body">
                        <p>¿Seguro que desea eliminar este
                            registro?</p>
                        <p class="name">{{ url('/appointments/'.$appointment->name) }}</p>
                    </div>
                    <div class="modal-footer">
                        <form class="form-inline form-delete"
                              role="form"
                              method="POST"
                              action="{{ url('/appointments/'.$appointment->id) }}">
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
