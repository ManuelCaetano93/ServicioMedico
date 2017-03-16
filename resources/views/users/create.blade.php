    @extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear Usuario</div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/users') }}">
                            {{ method_field('POST') }}
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Nombre</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name"
                                           value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <spam class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </spam>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('surname') ? ' has-error' : '' }}">
                                <label for="surname" class="col-md-4 control-label">Apellido</label>

                                <div class="col-md-6">
                                    <input id="surname" type="text" class="form-control" name="surname"
                                           value="{{ old('surname') }}" required>

                                    @if ($errors->has('surname'))
                                        <spam class="help-block">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </spam>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('identification') ? ' has-error' : '' }}">
                                <label for="identification" class="col-md-4 control-label">Cedula</label>

                                <div class="col-md-6">
                                    <input id="identification" type="text" class="form-control" name="identification"
                                           value="{{ old('identification') }}" required>

                                    @if ($errors->has('identification'))
                                        <spam class="help-block">
                                        <strong>{{ $errors->first('identification') }}</strong>
                                    </spam>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">
                                <label for="birthday" class="col-md-4 control-label">Fecha Nacimiento</label>
                                <div class="col-md-6">

                                    <input id="birthday" type="text" class="form-control datepicker" name="birthday"
                                           value="{{ old('birthday') }}"
                                           required readonly>
                                    @if ($errors->has('birthday'))
                                        <spam class="help-block">
                                        <strong>{{ $errors->first('birthday') }}</strong>
                                    </spam>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('sex') ? ' has-error' : '' }}">
                                <label for="sex" class="col-md-4 control-label">Sexo</label>

                                <div class="col-md-6">
                                    <select name="sex" id="sex" class="form-control">
                                        <option value="">Seleccione</option>
                                        <option value="female" @if(old('status')=='female') selected @endif>Femenino
                                        </option>
                                        <option value="male" @if(old('status')=='male') selected @endif>Masculino
                                        </option>
                                    </select>
                                    @if ($errors->has('sex'))
                                        <spam class="help-block">
                                        <strong>{{ $errors->first('sex') }}</strong>
                                    </spam>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label for="phone" class="col-md-4 control-label">Telefono</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control" name="phone"
                                           value="{{ old('phone') }}" required>

                                    @if ($errors->has('phone'))
                                        <spam class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </spam>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('cellphone') ? ' has-error' : '' }}">
                                <label for="cellphone" class="col-md-4 control-label">Celular</label>

                                <div class="col-md-6">
                                    <input id="cellphone" type="text" class="form-control" name="cellphone"
                                           value="{{ old('cellphone') }}" required>

                                    @if ($errors->has('cellphone'))
                                        <spam class="help-block">
                                        <strong>{{ $errors->first('cellphone') }}</strong>
                                    </spam>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('residence') ? ' has-error' : '' }}">
                                <label for="residence" class="col-md-4 control-label">Direccion</label>

                                <div class="col-md-6">
                                    <input id="residence" type="text" class="form-control" name="residence"
                                           value="{{ old('residence') }}" required>

                                    @if ($errors->has('residence'))
                                        <spam class="help-block">
                                        <strong>{{ $errors->first('residence') }}</strong>
                                    </spam>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email"
                                           value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <spam class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </spam>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <spam class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </spam>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required>
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