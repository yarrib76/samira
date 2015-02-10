@extends('layouts.app')
@section('content')
		
<div class="row">
	<div class="col-sm-10 col-sm-offset-1">
		<div class="panel panel-default">
			<div class="panel-heading">Listado de grupos</div>
			<div class="panel-body">


				<table class="table table-striped table-bordered records_list">
						<thead>
								<tr>
										<th>Nombre</th>
										<th>Ganancia</th>
                                        <th>Acciones</th>
										<th> </th>
								</tr>
						</thead>
						<tbody>
							@foreach ($grupos as $grupo)
								<tr>
										<td>{{$grupo->nombre}}</td>
										<td>{{$grupo->ganancia}}</td>
										<td>
										<ul>
												{!! HTML::linkRoute('grupo.edit', 'Editar', $grupo->id, array('class' => 'btn btn-success') ) !!}
												{!! HTML::linkRoute('grupo.show', 'Mostrar', $grupo->id, array('class' => 'btn btn-primary') ) !!}
												{!! HTML::linkRoute('grupo.destroy', 'Eliminar', $grupo->id, array('class' => 'btn btn-danger', 'data-method' => 'DELETE','data-confirm' => '¿Seguro desea eliminar la articulo?', 'rel' => 'nofollow') ) !!}
											
										</ul>
										</td>
								</tr>
							@endforeach
								
						</tbody>
				</table>

						<ul>
						<li>
								<a href="grupo/create">
										Nuevo Articulo
								</a>
						</li>
				</ul>
				</div>
		</div>
	</div>
</div>

@stop

