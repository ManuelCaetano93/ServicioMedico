@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear Recipe</div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('recipes') }}">
                            {{ method_field('POST') }}
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('patient') ? ' has-error' : '' }}">
                                <label for="patient" class="col-md-4 control-label">Paciente</label>
                                <div class="col-md-6">
                                    <select name="patient" id="patient" class="form-control">
                                        <option value="">Seleccione</option>
                                        @foreach($patients as $patient)
                                                <option value="{{ $patient->id }}" >{{ $patient->name }} {{ $patient->surname }} - {{ $patient->identification }}</option>
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

                            <div class="form-group{{ $errors->has('medicines') ? ' has-error' : '' }}">
                                <label for="medicines" class="col-md-4 control-label">Medicines</label>

                                <div class="col-md-6">
                                    @foreach($medicines as $medicine)
                                        <label class="checkbox-inline">
                                            <input class="i-check" type="checkbox" id="medicines" name="medicines[]" value="{{ $medicine->id  }}">
                                            {{ $medicine->name  }}
                                        </label><br>
                                    @endforeach
                                    @if($errors->has('medicines'))
                                        <spam class="help-block">
                                            <strong>{{ $errors->first('medicines') }}</strong>
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
