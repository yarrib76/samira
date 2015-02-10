@extends('layouts.date')
@extends('layouts.app')
@section('content')

<div class="row">
	<div class="col-sm-10 col-sm-offset-1">
		<div class="panel panel-default">
			<div class="panel-heading">Listado de articulos</div>
			<div class="panel-body">


				<table class="table table-striped table-bordered records_list">
						<thead>
                        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
                        <script>
                            $(document).ready(function() {
                                $("#cat").change(function(evento){

                                category_id = $(this).val();
                                $('#secondcat').empty();
                                $.ajax({
                                    type: 'get',
                                    url:  'ajaxislemi',
                                    data: 'category_id='+category_id,
                                    contentType: "application/json; charset=utf-8",
                                    dataType: "json",
                                    success:function(datos, textStatus, jqXHR){
                                        $.each(datos,function(i, value ){
                                            $('#secondcat').append('<option value=' + value['nombre']+ '>' + value['nombre'] + '</option>');
                                        }); // each

                                    },
                                    error:function(datos){
                                        alert("Este callback maneja los errores " + datos);
                                    }

                                }); // ajax


                            }); // change`

                            });
                        </script>
                        <div class="col-sm-6">
                            <form class="form-horizontal" role="form" method="POST" action="/buscar">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-3">
                                        <tr>
                                            <th>{!! Form::text('fecha', null, ['class' => 'form-control', 'type' => 'text', 'id' => 'datepicker', 'name' => 'fecha', 'placeholder' => 'Seleccione Fecha']) !!} </th>
                                            <th><button type="submit" class="btn btn-primary" name="crear"><i class="fa fa-btn fa-user"></i>Buscar</button></th>
                                        </tr>
                                    </div>
                                </div>
                            </form>

                            <th>{!! Form::checkbox('name', 'value', true) !!}
                            <th>{!! Form::radio('name', 'value', true) !!}
                        </div>

								<tr>
										<th>Nombre</th>
										<th>Descripcion</th>
                                        <th>Ganancia</th>
                                        <th>Porcentaje</th>
                                        <th>Creado</th>
                                        <th>Acciones</th>
										<th> </th>
								</tr>
						</thead>
						<tbody>
                        <th><select class="form-control" name="category_id" id="cat" >
                                <option value="" disabled selected> Seleccione Primero </option>
                                @foreach($articulos as $articulo)
                                    <option  value="{{ $articulo->grupos_id }}"> {{ $articulo->nombre }} </option>
                                @endforeach
                            </select>
                            <select  name="kampanya_adi" class="form-control" id="secondcat" >
                                <option> </option>
                            </select></th>
							@foreach ($articulos as $articulo)

 								<tr>
										<td>{{$articulo->nombre}}</td>
										<td>{{$articulo->descripcion}}</td>
                                        <td>{{$articulo->grupo->nombre}}</td>
                                        <td>{{$articulo->grupo->ganancia }}</td>
                                        <td>{{$articulo->created_at }}</td>
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
                <?php echo $articulos->render(); ?>

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

