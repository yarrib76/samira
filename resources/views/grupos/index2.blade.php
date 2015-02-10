@extends('layouts.app')
@section('content')
		
<div class="row">
	<div class="col-sm-10 col-sm-offset-1">
		<div class="panel panel-default">
			<div class="panel-heading">Listado de grupos</div>
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
                                        url:  'selecgrupos',
                                        data: 'category_id='+category_id,
                                        contentType: "application/json; charset=utf-8",
                                        dataType: "json",
                                        success:function(datos, textStatus, jqXHR){
                                            var cont=1;
                                            $.each(datos,function(i, value ){
                                                $('#secondcat').append('<option value=' + value['id']+ '>' + value['nombre'] + '</option>');
                                                if (cont < 2) {
                                                    $('#nombre2').val(value['id']);
                                                    cont=cont+1;
                                                }
                                            }); // each
                                        },
                                        error:function(datos){
                                            alert("Este callback maneja los errores " + datos);
                                        }

                                    }); // ajax


                                }); // change`
                                //Le paso el valor de select a un TextInput llamado nombre2
                                $("#secondcat").change(function(evento){
                                    $('#nombre2').val($(this).val());
                                });
                            });
                        </script>
								<tr>
										<th>Nombre</th>
										<th>Ganancia</th>
                                        <th>Acciones</th>
										<th> </th>
								</tr>
						</thead>
						<tbody>
                        <th>Grupos: <select class="form-control" name="category_id" id="cat" >
                                <option value="" disabled selected> Seleccione Primero </option>
                                @foreach($grupos as $grupo)
                                    <option  value="{{ $grupo->id }}"> {{ $grupo->nombre }} </option>
                                @endforeach
                            </select>
                           Articulos: <select  name="kampanya_adi" class="form-control" id="secondcat" >
                                <option> </option>
                            </select></th>
                             ID_Articulo: <input type="text" name="nombre2" id="nombre2" class="nombre2" value="">
                        @foreach ($grupos as $grupo)
								<tr>
										<td>{{$grupo->nombre}}</td>
										<td>{{$grupo->ganancia}}</td>
										<td>
										<ul>
												{!! HTML::linkRoute('grupo.edit', 'Editar', $grupo->id, array('class' => 'btn btn-success') ) !!}
												{!! HTML::linkRoute('grupo.show', 'Mostrar', $grupo->id, array('class' => 'btn btn-primary') ) !!}
												{!! HTML::linkRoute('grupo.destroy', 'Eliminar', $grupo->id, array('class' => 'btn btn-danger', 'data-method' => 'DELETE','data-confirm' => '¿Seguro desea eliminar la articulo?', 'rel' => 'nofollow') ) !!}
											
										</ul>
										</td>
								</tr>
							@endforeach
								
						</tbody>
				</table>

						<ul>
						<li>
								<a href="grupo/create">
										Nuevo Articulo
								</a>
						</li>
				</ul>
				</div>
		</div>
	</div>
</div>

@stop

