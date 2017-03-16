@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear Medicina</div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/medicines') }}">
                            {{ method_field('POST') }}
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Nombre</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name"
                                           value="{{ old('name') }}" autofocus>

                                    @if ($errors->has('name'))
                                        <spam class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </spam>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('component') ? ' has-error' : '' }}">
                                <label for="component" class="col-md-4 control-label">Componente activo</label>

                                <div class="col-md-6">
                                    <input id="component" type="text" class="form-control" name="component"
                                           value="{{ old('component') }}" autofocus>

                                    @if ($errors->has('component'))
                                        <spam class="help-block">
                                            <strong>{{ $errors->first('component') }}</strong>
                                        </spam>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('presentation') ? ' has-error' : '' }}">
                                <label for="presentation" class="col-md-4 control-label">Presentacion</label>

                                <div class="col-md-6">
                                    <input id="presentation" type="text" class="form-control" name="presentation"
                                           value="{{ $medicines->presentation or old('presentation') }}" autofocus>

                                    @if ($errors->has('presentation'))
                                        <spam class="help-block">
                                            <strong>{{ $errors->first('presentation') }}</strong>
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
