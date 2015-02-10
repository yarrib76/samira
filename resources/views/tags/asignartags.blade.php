@extends('layouts.app')
@section('content')
		
<div class="row">
	<div class="col-sm-10 col-sm-offset-1">
		<div class="panel panel-default">
			<div class="panel-heading">Asignar Tags</div>
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
                        <form class="form-horizontal" role="form" method="POST" action="/guardatag">
                        <th>Artciculos: <select class="form-control" name="articulo" id="articulo" >
                                <option value="" disabled selected> Seleccione Articulo </option>
                                @foreach($articulos as $articulo)
                                    <option  value="{{ $articulo->id }}"> {{ $articulo->nombre }} </option>
                                @endforeach
                            </select>
                           Tags: <select class="form-control" name="tag" id="tag" >
                                <option value="" disabled selected> Seleccione Tag </option>
                                @foreach($tags as $tag)
                                    <option  value="{{ $tag->id }}"> {{ $tag->nombre }} </option>
                                @endforeach
                            </select>
						</tbody>
				</table>

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-3">
                                    <button type="submit" class="btn btn-primary" name="guardar"><i class="fa fa-btn fa-user"></i>Guardar</button>
                                </div>
                            </div>
				</form>
		</div>
	</div>
</div>

@stop

