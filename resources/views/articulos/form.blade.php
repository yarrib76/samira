<div class="form-group">

	{!! Form::label('nombre', 'Nombre:', ['class' => 'col-sm-3 control-label']) !!}

	<div class="col-sm-6">
	{!! Form::text('nombre', null, ['class' => 'form-control', 'type' => 'text', 'id' => 'nombre', 'name' => 'nombre', 'placeholder' => 'Nombre de la flota']) !!}
	</div>

</div>

<div class="form-group">
	{!! Form::label('descripcion', 'Descripcion:', ['class' => 'col-sm-3 control-label']) !!}
	<div class="col-sm-6">
	{!! Form::text('descripcion', null, ['class' => 'form-control', 'type' => 'text', 'id' => 'descripcion', 'name' => 'descripcion', 'placeholder' => 'Descripcion de la flota']) !!}
	</div>
</div>

<div class="form-group">
    {!! Form::label('grupo', 'Grupos:',['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::select('grupos_id', $grupos, null ,['class' => 'form-control'] ) !!}
    </div>
</div>





