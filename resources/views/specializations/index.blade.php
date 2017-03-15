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
                        @foreach($specializations as $specialization)
                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-block">
                                        <div>
                                            <h4 class="card-title">{{ $specialization->name }}</h4>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-6 text-center">
                                                <a href="{{ url('specializations/'.$specialization->id.'/edit') }}"
                                                   class="btn btn-primary">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </div>

                                            <div class="col-sm-6 text-center">
                                                <button class="btn btn-danger"
                                                        data-action="{{ url('/specializations/'.$specialization->id) }}"
                                                        data-name="{{ $specialization->name }}"
                                                        data-toggle="modal"
                                                        data-target="#confirm-delete{{$specialization->id}}">
                                                    <i class="fa fa-trash fa-1x"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <tr>
                            <td colspan="7" class="text-center">
                                {{ $specializations->links() }}
                            </td>
                        </tr>
                    </div>
                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD
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
=======
>>>>>>> parent of c6861bc... Merge pull request #19 from ManuelCaetano93FG/Dev_sabina
@endsection
