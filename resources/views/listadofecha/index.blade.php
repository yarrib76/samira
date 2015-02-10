@extends('layouts.app')
@section('content')
		
<div class="row">
	<div class="col-sm-10 col-sm-offset-1">
		<div class="panel panel-default">
			<div class="panel-heading">Listado de Articulos por Fecha</div>
			<div class="panel-body">


				<table class="table table-striped table-bordered records_list">
						<thead>
								<tr>
										<th>Nombre</th>
										<th>Descripcion</th>
                                        <th>Ganancia</th>
                                        <th>Porcentaje</th>
                                        <th>Acciones</th>
										<th> </th>
								</tr>
						</thead>
						<tbody>
							@foreach ($articulos as $articulo)
								<tr>
										<td>{{$articulo->nombre}}</td>
										<td>{{$articulo->descripcion}}</td>
                                        <td>{{$articulo->grupo->nombre}}</td>
                                        <td>{{$articulo->grupo->ganancia }}</td>
										<td>
										<ul>
										
												{!! HTML::linkRoute('articulo.edit', 'Editar', $articulo->id, array('class' => 'btn btn-success') ) !!}
												{!! HTML::linkRoute('articulo.show', 'Mostrar', $articulo->id, array('class' => 'btn btn-primary') ) !!}
												{!! HTML::linkRoute('articulo.destroy', 'Eliminar', $articulo->id, array('class' => 'btn btn-danger', 'data-method' => 'DELETE','data-confirm' => '¿Seguro desea eliminar la articulo?', 'rel' => 'nofollow') ) !!}
											
										</ul>
										</td>
								</tr>
							@endforeach
								
						</tbody>
				</table>

						<ul>
						<li>
								<a href="articulo/create">
										Nuevo Articulo
								</a>
						</li>
				</ul>
				</div>
		</div>
	</div>
</div>

@stop

