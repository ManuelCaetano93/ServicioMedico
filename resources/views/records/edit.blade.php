@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar record</div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST"
                              action="{{ url('/records/'.$record->id) }}">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Nombre del Paciente</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ $record->name or old('name') }}"" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description" class="col-md-4 control-label">Descripcion</label>

                                <div class="col-md-6">
                                    <textarea name="description" id="description" cols="30" rows="5"
                                              class="form-control" >{{ $record->description or old('description') }}</textarea>

                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('suffering') ? ' has-error' : '' }}">
                                <label for="suffering" class="col-md-4 control-label">Padecimiento</label>

                                <div class="col-md-6">
                                    <textarea name="suffering" id="suffering" cols="30" rows="5"
                                              class="form-control">{{ $record->suffering or old('suffering') }}</textarea>

                                    @if ($errors->has('suffering'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('suffering') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('doctor') ? ' has-error' : '' }}">
                                <label for="doctor" class="col-md-4 control-label">Medico Anterior</label>

                                <div class="col-md-6">
                                    <textarea name="doctor" id="doctor" cols="30" rows="5"
                                              class="form-control">{{ $record->doctor or old('doctor') }}</textarea>

                                    @if ($errors->has('doctor'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('doctor') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('pretreatments') ? ' has-error' : '' }}">
                                <label for="pretreatments" class="col-md-4 control-label">Tratamiento Anterior</label>

                                <div class="col-md-6">
                                    <textarea name="pretreatments" id="pretreatments" cols="30" rows="5"
                                              class="form-control" >{{ $record->pretreatments or old('pretreatments') }}</textarea>

                                    @if ($errors->has('pretreatments'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('pretreatments') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('medicines') ? ' has-error' : '' }}">
                                <label for="medicines" class="col-md-4 control-label">Medicinas</label>

                                <div class="col-md-6">
                                    <textarea name="medicines" id="medicines" cols="30" rows="5"
                                              class="form-control">{{ $record->medicines or old('medicines') }}</textarea>

                                    @if ($errors->has('medicines'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('medicines') }}</strong>
                                    </span>
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
                                        <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
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