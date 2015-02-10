@extends('layouts.app')
@section('content')
		
<div class="row">
	<div class="col-sm-10 col-sm-offset-1">
		<div class="panel panel-default">
			<div class="panel-heading">Listado de Articulos</div>
			<div class="panel-body">

				<h1>{{ $articulo->nombre  }} </h1>
				<h3>{{ $articulo->descripcion }} </h3>
                <h3>{{ $articulo->grupos_id }} </h3>
							{!! HTML::linkRoute('articulo.edit', 'Editar', $articulo, array('class' => 'btn btn-primary') ) !!}
							{!! HTML::linkRoute('articulo.index', 'Volver al listado', null, array('class' => 'btn btn-primary') ) !!}
				</div>
		</div>
	</div>
</div>

@stop

