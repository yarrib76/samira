@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
	<div class="col-sm-8 col-sm-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">Editar Grupo</div>
			<div class="panel-body">

				@include('partials.errors.basic')

				{!! Form::model($grupo, ['route' => ['grupo.update', $grupo->id], 'method' => 'PATCH', 'class' => 'form-horizontal']) !!}
					
					<input type="hidden" name="_token" value="{{ csrf_token() }}">

				@include('grupos.form')
					
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-6">
							<button type="submit" class="btn btn-success" name="editar"><i class="fa fa-btn fa-user"></i>Actualizar</button>
							{!! HTML::linkRoute('grupo.index', 'Cancelar', null, array('class' => 'btn btn-primary') ) !!}
						</div>
					</div>
{!! Form::close() !!}

			</div>
		</div>
	</div>
</div>
</div>
@stop
