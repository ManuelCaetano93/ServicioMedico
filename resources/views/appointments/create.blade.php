@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear Cita</div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/appointments') }}">
                            {{ method_field('POST') }}
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('id_user_patient') ? ' has-error' : '' }}">
                                <label for="id_user_patient" class="col-md-4 control-label ">Usuario</label>

                                <div class="col-md-6">
                                    <input id="id_user_patient" type="hidden" class="form-control" name="id_user_patient"
                                           value="{{ $user->id }}">
                                    <div class="panel panel-default input-group-md">{{ $user->name }} {{ $user->surname }}</div>

                                    @if ($errors->has('id_user_patient'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('id_user_patient') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                                <label for="date" class="col-md-4 control-label">Date</label>

                                <div class="col-md-6">
                                    <input id="date" type="text" class="form-control datepicker" name="date"
                                           value="" required autofocus readonly>

                                    @if ($errors->has('date'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('id_user_doctor') ? ' has-error' : '' }}">
                                <label for="id_user_doctor" class="col-md-4 control-label">Cedula</label>

                                <div class="col-md-6">
                                    <input id="id_user_doctor" type="text" class="form-control" name="id_user_doctor"
                                           value="" required>
                                    @if ($errors->has('id_user_doctor'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('id_user_doctor') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="specialization" class="col-md-4 control-label">Especializacion</label>

                                <div class="col-md-6">
                                    <select name="specialization" id="specialization" class="form-control">
                                        <option value="">Seleccione</option>
                                        @foreach($specializations as $specialization)
                                        <option value="{{ $specialization->id }}" >{{ $specialization->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="panel-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Apellido</th>
                                        <th width="10%" colspan="4">Acciones</th>

                                    </tr>
                                    @foreach( $users as $user)
                                        <tr>
                                            <td>Dr. {{ $user->surname }}</td>
                                            {{-- <td>
                                                <a href="{{ url('users/'.$user->id.'/permissions') }}" class="btn btn-warning">
                                                    <i class="fa fa-id-card"></i>
                                                </a>
                                            </td> --}}

                                            <td>
                                                <button class="btn btn-success"
                                                        data-action=""
                                                        data-name=""
                                                        data-toggle="modal" data-target="">
                                                    <i class="fa fa-id-card fa-1x"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
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
