<div class="form-group">

	{!! Form::label('nombre', 'Nombre:', ['class' => 'col-sm-3 control-label']) !!}

	<div class="col-sm-6">
	{!! Form::text('nombre', null, ['class' => 'form-control', 'type' => 'text', 'id' => 'nombre', 'name' => 'nombre', 'placeholder' => 'Nombre del Grupo']) !!}
	</div>

</div>

<div class="form-group">
	{!! Form::label('descripcion', 'Ganancia:', ['class' => 'col-sm-3 control-label']) !!}
	<div class="col-sm-6">
	{!! Form::text('ganancia', null, ['class' => 'form-control', 'type' => 'text', 'id' => 'ganancia', 'name' => 'ganancia', 'placeholder' => 'Descripcion del Grupo']) !!}
	</div>
</div>




