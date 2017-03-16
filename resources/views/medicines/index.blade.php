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
<<<<<<< HEAD
                            <div class="col-xs-4"><h5>Medicinas</h5></div>
                            <div class="col-xs-8 text-right">
=======
                            <div class="col-xs-6"><h5>Medicinas</h5></div>
                            <div class="col-xs-6 text-right">
>>>>>>> Dev_sabina
                                <a href="{{ url('/medicines/create') }}" class="btn btn-success">Nueva Medicina
                                </a>
                                <a href="{{ url('/medicines/deleted') }}" class="btn btn-success">Recuperar
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                            @foreach($medicines as $medicine)
                                <div class="col-sm-5">
                                    <div class="card">
                                        <div class="card-block">
                                            <h3 class="card-title">{{ $medicine->name }}</h3>
                                            <p class="card-text">{{ $medicine->component }}</p>
                                            <p class="card-text">{{ $medicine->presentation }}</p>

                                            <hr>
                                            <a href="{{ url('medicines/'.$medicine->id.'/medicines') }}"
                                               class="btn btn-warning">
                                                <i class="fa fa-id-card"></i>
                                            </a>
                                            <a href="{{ url('medicines/'.$medicine->id.'/edit') }}"
                                               class="btn btn-primary">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <button class="btn btn-danger"
                                                    data-action="{{ url('/medicines/'.$medicine->id) }}"
                                                    data-name="{{ $medicine->name }}"
                                                    data-toggle="modal" data-target="#confirm-delete{{$medicine->id}}">
                                                <i class="fa fa-trash fa-1x"></i>
                                            </button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <tr>
                            <td colspan="4" class="text-center">
                                {{ $medicines->links() }}
                            </td>
                        </tr>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach($medicines as $medicine)
        <div class="modal fade" id="confirm-delete{{$medicine->id}}" tabindex="-1"
             role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    </div>
                    <div class="modal-body">
                        <p>¿Seguro que desea eliminar este
                            registro?</p>
                        <p class="name">{{ $medicine->name }}</p>
                    </div>
                    <div class="modal-footer">
                        <form class="form-inline form-delete"
                              role="form"
                              method="POST"
                              action="{{ url('/medicines/'.$medicine->id) }}">
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