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
                                        <div class="text-center">
                                            <a href="{{ url('specializations/'.$specialization->id.'/edit') }}"
                                               class="btn btn-primary">
                                                <i class="fa fa-edit"></i>
                                            </a>
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
@endsection
