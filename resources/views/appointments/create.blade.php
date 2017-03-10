@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear Cita</div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/appointments/'.$user->id.'/create') }}">
                            {{ method_field('POST') }}
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('id_user_patient') ? ' has-error' : '' }}">
                                <label for="id_user_patient" class="col-md-4 control-label ">Usuario</label>
                                <div class="col-md-6">
                                    <div name="id_user_patient" class="panel panel-default">{{ $user->name }} {{ $user->surname }}</div>
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
                                <label for="id_user_doctor" class="col-md-4 control-label">Doctor</label>
                                <div class="col-md-6">
                                    <select name="id_user_doctor" id="id_user_doctor" class="form-control">
                                        <option value="">Seleccione</option>
                                        @foreach($doctors as $doctor)
                                            @if($doctor->hasRole('Doctor'))
                                                <option value="{{ $doctor->id }}" >Dr.{{ $doctor->surname }}: @foreach($doctor->specializations as $specialization) -- {{ $specialization->name }} @endforeach </option>
                                            @endif
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
