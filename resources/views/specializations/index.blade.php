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
                            <div class="col-xs-4"><h5>Especializaciones</h5></div>
                            <div class="col-xs-6 text-right">
                                <button href="{{ url('/specializations/create') }}" class="btn btn-success">Nueva Especializacion
                                </button>
                            </div>
                            <div class="col-xs-2 text-right">
                                <button href="{{ url('/specializations/deleted') }}" class="btn btn-success">Recuperar
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Nombre</th>
                                <th width="10%" colspan="3">Acciones</th>
                            </tr>
								@foreach($specializations as $specialization)
									<tr>
										<td>{{ $specialization->name }}</td>
										<td>
											<a href="{{ url('specializations/'.$specialization->id.'/edit') }}" class="btn btn-primary">
												<i class="fa fa-edit"></i>
											</a>

										</td>
										<td>
											<form method="POST" action="/specialization/{{ $specialization->id }}/delete">
												<input type="hidden" name="_token" value="{{ csrf_token() }}">
												<input type="hidden" name="_method" value="DELETE" />
												<button type="submit" class="btn btn-danger">
													Delete
												</button>
											</form>
										</td>
									</tr>
								@endforeach
								<tr>
									<td colspan="7" class="text-center">
										{{ $specializations->links() }}
									</td>
								</tr>
							
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
