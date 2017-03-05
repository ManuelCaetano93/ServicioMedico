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
                                <label for="id_user_patient" class="col-md-4 control-label">Cedula</label>

                                <div class="col-md-6">
                                    <input id="id_user_patient" type="text" class="form-control" name="id_user_patient"
                                           value="{{ $user->id }}" required autofocus readonly>

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
