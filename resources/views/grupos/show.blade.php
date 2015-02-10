@extends('layouts.app')
@section('content')
		
<div class="row">
	<div class="col-sm-10 col-sm-offset-1">
		<div class="panel panel-default">
			<div class="panel-heading">Listado de Grupos</div>
			<div class="panel-body">

				<h1>{{ $grupo->nombre  }} </h1>
				<h3>{{ $grupo->ganancia }} </h3>
							{!! HTML::linkRoute('grupo.edit', 'Editar', $grupo, array('class' => 'btn btn-primary') ) !!}
							{!! HTML::linkRoute('grupo.index', 'Volver al listado', null, array('class' => 'btn btn-primary') ) !!}
				</div>
		</div>
	</div>
</div>

@stop

