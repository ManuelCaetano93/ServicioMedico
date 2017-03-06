@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Asignar specializations user</div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST"
                              action="{{ url('/users/'.$user->id.'/associatespecialization') }}">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Nombre</label>

                                <div class="col-md-6">
                                    <p>{{ $user->name }}</p>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('surname') ? ' has-error' : '' }}">
                                <label for="surname" class="col-md-4 control-label">Apellido</label>

                                <div class="col-md-6">
                                    <i>{{ $user->surname }}</i>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('specializations') ? ' has-error' : '' }}">
                                <label for="specializations" class="col-md-4 control-label">Especializaciones</label>

                                <div class="col-md-6">
                                    @foreach($specializations as $specialization)
                                        <label class="checkbox-inline">
                                            <input class="i-check" type="checkbox" id="specializations" name="specializations[]" value="{{ $specialization->id  }}"
                                                   @if( $specialization->users->contains((string)($user->id)) == $specialization->id) checked @endif >
                                                {{ $specialization->name  }}
                                        </label><br>
                                    @endforeach
                                    @if($errors->has('specializations'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('specializations') }}</strong>
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