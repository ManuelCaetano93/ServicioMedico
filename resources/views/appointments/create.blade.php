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

                            <div class="form-group{{ $errors->has('patient_identification') ? ' has-error' : '' }}">
                                <label for="patient_identification" class="col-md-4 control-label">Cedula</label>

                                <div class="col-md-6">
                                    <input id="patient_identification" type="text" class="form-control" name="patient_identification"
                                       value="" required>
                                    @if ($errors->has('patient_identification'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('patient_identification') }}</strong>
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

                            <div class="form-group{{ $errors->has('doctor_identification') ? ' has-error' : '' }}">
                                <label for="doctor_identification" class="col-md-4 control-label">Cedula</label>

                                <div class="col-md-6">
                                    <input id="doctor_identification" type="text" class="form-control" name="doctor_identification"
                                           value="" required>
                                    @if ($errors->has('id_user_doctor'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('doctor_identification') }}</strong>
                                    </span>
                                    @endif
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
