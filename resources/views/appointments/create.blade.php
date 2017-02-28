@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear Especializacion</div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/appointments') }}">
                            {{ method_field('POST') }}
                            {{ csrf_field() }}

                            <div class="input-group col-md-6" data-provide="datepicker">
                                <input type="text" class="form-control datepicker">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Guardar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
