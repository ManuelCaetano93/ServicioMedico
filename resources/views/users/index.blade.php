@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('mensaje'))
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-info alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <strong>Info:</strong> {{ session('mensaje') }}.
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6"><h5>Usuarios</h5></div>
                            <div class="col-xs-6 text-right">
                                <a href="{{ url('/users/create') }}" class="btn btn-success">Nuevo Usuario
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @foreach( $users as $user)
                            <div class="col-md-5">
                                <div class="card testimonial-card">
                                    <div class="text-center">
                                        <div class="panel-heading btn-info" style="background-color: #D4F1FC">
                                            <img src="http://placehold.it/100x100"
                                                 class="img-circle img-responsive img-thumbnail back">
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <h4 class="card-title text-center">{{ $user->name }} {{ $user->surname }}</h4>
                                        <hr>
                                        <h6>
                                            <strong>CI:</strong>
                                            {{ $user->identification }}</h6>
                                        <h6>
                                            <strong>Sexo:</strong>
                                            @if($user->sex == 'male') Hombre @endif @if($user->sex == 'female') Mujer @endif</h6>
                                        <h6><strong>Email:</strong>
                                            {{ $user->email }}</h6>
                                        <hr>
                                        <div class="text-center">
                                            <td>
                                                <a href="{{ url('users/'.$user->id.'/permissions') }}"
                                                   class="btn btn-warning">
                                                    <i class="fa fa-id-card"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ url('users/'.$user->id.'/edit') }}"
                                                   class="btn btn-primary">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ url('users/'.$user->id.'/associate') }}"
                                                   class="btn btn-info">
                                                    <i class="fa fa-stethoscope"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ url('users/'.$user->id.'/appointment') }}"
                                                   class="btn btn-success">
                                                    <i class="fa fa-calendar-check-o"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger"
                                                        data-action="{{ url('/users/'.$user->id) }}"
                                                        data-name="{{ $user->name }}"
                                                        data-toggle="modal"
                                                        data-target="#confirm-delete{{$user->id}}">
                                                    <i class="fa fa-trash fa-1x"></i>
                                                </button>
                                            </td>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <tr>
                            <td colspan="7" class="text-center">
                                {{ $users->links() }}
                            </td>
                        </tr>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach($users as $user)
        <div class="modal fade" id="confirm-delete{{$user->id}}" tabindex="-1"
             role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    </div>
                    <div class="modal-body">
                        <p>¿Seguro que desea eliminar este
                            registro?</p>
                        <p class="name">{{ $user->name }}</p>
                    </div>
                    <div class="modal-footer">
                        <form class="form-inline form-delete"
                              role="form"
                              method="POST"
                              action="{{ url('/users/'.$user->id) }}">
                            {!! method_field('DELETE') !!}
                            {!! csrf_field() !!}
                            <button type="button"
                                    class="btn btn-default"
                                    data-dismiss="modal">Cancelar
                            </button>
                            <button id="delete-btn"
                                    class="btn btn-danger"
                                    title="Eliminar">Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
