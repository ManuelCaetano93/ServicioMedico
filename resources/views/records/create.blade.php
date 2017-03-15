@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear Historia Medica</div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/records') }}">
                            {{ method_field('POST') }}
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('patient_id') ? ' has-error' : '' }}">
                                <label for="patient_id" class="col-md-4 control-label">Nombre del Paciente</label>
                                <div class="col-md-6">
                                    <select name="patient_id" id="patient_id" class="form-control">
                                        <option value="">Seleccione</option>
                                        @foreach($doctors as $doctor)
                                                <option value="{{ $doctor->id }}" >{{ $doctor->name }} {{ $doctor->surname }} - {{ $doctor->identification }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description" class="col-md-4 control-label">Descripcion</label>

                                <div class="col-md-6">
                                    <textarea name="description" id="description" cols="30" rows="5"
                                              class="form-control">{{ old('description') }}</textarea>

                                    @if ($errors->has('description'))
                                        <spam class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </spam>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('suffering') ? ' has-error' : '' }}">
                                <label for="suffering" class="col-md-4 control-label">Padecimiento</label>

                                <div class="col-md-6">
                                    <textarea name="suffering" id="suffering" cols="30" rows="5"
                                              class="form-control">{{ old('suffering') }}</textarea>

                                    @if ($errors->has('suffering'))
                                        <spam class="help-block">
                                        <strong>{{ $errors->first('suffering') }}</strong>
                                    </spam>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('doctor') ? ' has-error' : '' }}">
                                <label for="doctor" class="col-md-4 control-label">Doctor</label>
                                <div class="col-md-6">
                                    <select name="doctor" id="doctor" class="form-control">
                                        <option value="">Seleccione</option>
                                        @foreach($doctors as $doctor)
                                            @if($doctor->hasRole('Doctor'))
                                                <option value="{{ $doctor->id }}" >Dr.{{ $doctor->surname }}: @foreach($doctor->specializations as $specialization) -- {{ $specialization->name }} @endforeach </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('pretreatments') ? ' has-error' : '' }}">
                                <label for="pretreatments" class="col-md-4 control-label">Tratamiento Anterior</label>

                                <div class="col-md-6">
                                    <textarea name="pretreatments" id="pretreatments" cols="30" rows="5"
                                              class="form-control">{{ old('pretreatments') }}</textarea>

                                    @if ($errors->has('pretreatments'))
                                        <spam class="help-block">
                                        <strong>{{ $errors->first('pretreatments') }}</strong>
                                    </spam>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('medicines') ? ' has-error' : '' }}">
                                <label for="medicines" class="col-md-4 control-label">Medicinas</label>

                                <div class="col-md-6">
                                    <textarea name="medicines" id="medicines" cols="30" rows="5"
                                              class="form-control">{{ old('medicines') }}</textarea>

                                    @if ($errors->has('medicines'))
                                        <spam class="help-block">
                                        <strong>{{ $errors->first('medicines') }}</strong>
                                    </spam>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                <label for="status" class="col-md-4 control-label">Estatus</label>

                                <div class="col-md-6">
                                    <select name="status" id="status" class="form-control">
                                        <option value="">Seleccione</option>
                                        <option value="activo" @if(old('status')=='activo') selected @endif>Activo</option>
                                        <option value="inactivo" @if(old('status')=='inactivo') selected @endif>Inactivo</option>
                                    </select>
                                    @if ($errors->has('status'))
                                        <spam class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </spam>
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
