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
                            <div class="col-xs-8 text-right">
                                <a href="{{ url('/appointments') }}" class="btn btn-success">Volver
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @foreach($appointments as $appointment)

                            @if($appointment->deleted_at != null)
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
                                                <form method="POST"
                                                      action="/appointment/{{ $appointment->id }}/restore">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="hidden" name="_method" value="POST"/>
                                                    <button type="submit" class="btn btn-success">
                                                        <i class="fa fa-undo" aria-hidden="true"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                        @endforeach
                        {{ $appointments->links() }}

                    </div>
                </div>
            </div>
        </div>
    {{-- @if(Session::has('appointments'))
    <div class="modal fade" id="confirm-restore" tabindex="-1"
         role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                
            </div>
        </div>
    </div>
    @endif --}}
@endsection
