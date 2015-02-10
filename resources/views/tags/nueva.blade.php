@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
	<div class="col-sm-8 col-sm-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">Crear Articulo</div>
			<div class="panel-body">

				@include('partials.errors.basic')

				<form class="form-horizontal" role="form" method="POST" action="/tag">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
				@include('tags.form')
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-3">
							<button type="submit" class="btn btn-primary" name="crear"><i class="fa fa-btn fa-user"></i>Agregar Tag</button>
						</div>
					</div>
				</form>

			</div>
		</div>
	</div>
</div>
</div>
@stop
