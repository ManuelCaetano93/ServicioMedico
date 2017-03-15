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
                            <div class="col-xs-4"><h5>Especializaciones</h5></div>
                            <div class="col-xs-6 text-right">
                                <a href="{{ url('/specializations/create') }}" class="btn btn-success">Nueva
                                    Especializacion
                                </a>
                            </div>
                            <div class="col-xs-2 text-right">
                                <a href="{{ url('/specializations/deleted') }}" class="btn btn-success">Recuperar
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                    </div>
                    @foreach($specializations as $specialization)
                        <div class="modal fade" id="confirm-delete{{$specialization->id}}" tabindex="-1"
                             role="dialog" aria-labelledby="myModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    </div>
                                    <div class="modal-body">
                                        <p>¿Seguro que desea eliminar este
                                            registro?</p>
                                        <p class="name">{{ url('/specializations/'.$specialization->name) }}</p>
                                    </div>
                                    <div class="modal-footer">
                                        <form class="form-inline form-delete"
                                              role="form"
                                              method="POST"
                                              action="{{ url('/specializations/'.$specialization->id) }}">
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
                </div>
            </div>
        </div>
    </div>
@endsection