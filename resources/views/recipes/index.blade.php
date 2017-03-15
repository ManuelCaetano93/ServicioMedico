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
                        <div class="row fa-align-center">
                            <div class="col-xs-6"><h5>Recipe</h5></div>
                            <div class="col-xs-6 text-right">
                                <a href="{{ url('/recipes/create') }}" class="btn btn-success">Nuevo Recipe
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @foreach($recipes as $recipe)
                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-block">
                                        <h4 class="card-title">{{ $recipe->description }}</h4>
                                        <hr>
                                        <div class="text-center">
                                            <a href="{{ url('recipes/'.$recipe->id.'/recipes') }}"
                                               class="btn btn-warning">
                                                <i class="fa fa-id-card"></i>
                                            </a>
                                            <a href="{{ url('recipes/'.$recipe->id.'/edit') }}"
                                               class="btn btn-primary">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <button class="btn btn-danger"
                                                    data-action="{{ url('/recipes/'.$recipe->id) }}"
                                                    data-name="{{ $recipe->name }}"
                                                    data-toggle="modal"
                                                    data-target="#confirm-delete{{$recipe->id}}">
                                                <i class="fa fa-trash fa-1x"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-sm-12 text-center">
                            <tr>
                                <td colspan="3" class="text-center">
                                    {{ $recipes->links() }}
                                </td>
                            </tr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach($recipes as $recipe)
        <div class="modal fade" id="confirm-delete{{$recipe->id}}" tabindex="-1"
             role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    </div>
                    <div class="modal-body">
                        <p>¿Seguro que desea eliminar este
                            registro?</p>
                        <p class="name">{{ $recipe->name }}</p>
                    </div>
                    <div class="modal-footer">
                        <form class="form-inline form-delete"
                              role="form"
                              method="POST"
                              action="{{ url('/recipes/'.$recipe->id) }}">
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
