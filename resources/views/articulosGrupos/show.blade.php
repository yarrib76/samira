@extends('layouts.app')
@section('content')
		
<div class="row">
	<div class="col-sm-10 col-sm-offset-1">
		<div class="panel panel-default">
			<div class="panel-heading">Detalles del rol</div>
			<div class="panel-body">

				<h1>{{ $rol->nombre  }} </h1>
				<h3>{{ $rol->descripcion }} </h3>
							{!! HTML::linkRoute('rol.edit', 'Editar', $rol, array('class' => 'btn btn-primary') ) !!}
							{!! HTML::linkRoute('rol.index', 'Volver al listado', null, array('class' => 'btn btn-primary') ) !!}
				</div>
		</div>
	</div>
</div>

@stop

