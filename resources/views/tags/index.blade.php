@extends('layouts.date')
@extends('layouts.app')
@section('content')

<div class="row">
	<div class="col-sm-10 col-sm-offset-1">
		<div class="panel panel-default">
			<div class="panel-heading">Listado de Tags</div>
			<div class="panel-body">


				<table class="table table-striped table-bordered records_list">
						<thead>
                                <tr>
										<th>Nombre</th>
										<th>Descripcion</th>
                                        <th>Acciones</th>
										<th> </th>
								</tr>
						</thead>
						<tbody>

							@foreach ($tags as $tag)
 								<tr>
										<td>{{$tag->nombre}}</td>
										<td>{{$tag->descripcion}}</td>
										<td>
										<ul>
                                            	{!! HTML::linkRoute('tag.edit', 'Editar', $tag->id, array('class' => 'btn btn-success') ) !!}
												{!! HTML::linkRoute('tag.show', 'Mostrar', $tag->id, array('class' => 'btn btn-primary') ) !!}
												{!! HTML::linkRoute('tag.destroy', 'Eliminar', $tag->id, array('class' => 'btn btn-danger', 'data-method' => 'DELETE','data-confirm' => '¿Seguro desea eliminar la tag?', 'rel' => 'nofollow') ) !!}

										</ul>
										</td>
								</tr>
							@endforeach

						</tbody>
				</table>

						<ul>
						<li>
								<a href="tag/create">
										Nuevo tag
								</a>
						</li>
				</ul>
				</div>
		</div>
	</div>
</div>

@stop

