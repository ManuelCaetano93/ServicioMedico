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
                            <div class="col-xs-4"><h5>Citas</h5></div>
                            <div class="col-xs-6 text-right">
                                <a href="{{ url('/specializations/create') }}" class="btn btn-success">Nueva Cita
                                </a>
                            </div>
                            <div class="col-xs-2 text-right">
                                <a href="{{ url('/specializations/') }}" class="btn btn-success">Regresar
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="panel-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Fecha</th>
                                <th width="10%" colspan="3">Acciones</th>

                            </tr>
                            @foreach($specializations as $specialization)
                                <tr>
                                    @if($specialization->deleted_at != null)
                                        <td>{{ $specialization->date }}</td>
                                        <td>
                                            <a href="{{ url('specializations/'.$specialization->id.'/edit') }}" class="btn btn-primary">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                        </td>
                                        <td>
                                            <form method="POST" action="/specializations/{{ $specialization->id }}/restore">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="_method" value="POST" />
                                                <button type="submit" class="btn btn-success">
                                                    Restore
                                                </button>
                                            </form>
                                </tr>
                                @endif
                            @endforeach
                            <tr>
                                <td colspan="7" class="text-center">
                                    {{ $specializations->links() }}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- @if(Session::has('specializations'))
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
