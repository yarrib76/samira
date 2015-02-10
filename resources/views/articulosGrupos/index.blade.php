@extends('layouts.app')
@section('content')
		
<div class="row">
	<div class="col-sm-10 col-sm-offset-1">
		<div class="panel panel-default">
			<div class="panel-heading">Listado de rol-flota-usuario</div>
			<div class="panel-body">


				<table class="table table-striped table-bordered records_list">
						<thead>
								<tr>
										<th>Articulo</th>
										<th>Grupos</th>
								</tr>
						</thead>
						<tbody>
							@foreach ($rol_flota_usuarios as $rolFlotaUsuario)
								<tr>
										<td>{{$rolFlotaUsuario->usuario->nombre}}</td>
										<td>{{$rolFlotaUsuario->flota->nombre}}</td>
										<td>{{$rolFlotaUsuario->rol->nombre}}</td>
										<td>
										<ul>
										
												{!! HTML::linkRoute('rolFlotaUsuario.edit', 'Editar', $rolFlotaUsuario->id, array('class' => 'btn btn-success') ) !!}
												{!! HTML::linkRoute('rolFlotaUsuario.destroy', 'Eliminar', $rolFlotaUsuario->id, array('class' => 'btn btn-danger', 'data-method' => 'DELETE','data-confirm' => '¿Seguro desea eliminar la rol?', 'rel' => 'nofollow') ) !!}
												
										</ul>
										</td>
								</tr>
							@endforeach
								
						</tbody>
				</table>

						<ul>
												{!! HTML::linkRoute('rolFlotaUsuario.create', 'Crear Rol-Flota-Usuario', null, array('class' => 'btn btn-primary') ) !!}

				</ul>
				</div>
		</div>
	</div>
</div>

@stop

