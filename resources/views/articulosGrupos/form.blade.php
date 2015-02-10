
<div class="form-group">
	{!! Form::label('usuario', 'Usuario:',['class' => 'col-sm-3 control-label']) !!}
	<div class="col-sm-6">
  {!! Form::select('usuario_id', $usuarios, $rolFlotaUsuario->usuario_id ,['class' => 'form-control'] ) !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('rol', 'Rol:',['class' => 'col-sm-3 control-label']) !!}
	<div class="col-sm-6">
  {!! Form::select('rol_id', $roles, null ,['class' => 'form-control'] ) !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('flota', 'Flota:',['class' => 'col-sm-3 control-label']) !!}
	<div class="col-sm-6">
  {!! Form::select('flota_id', $flotas, null ,['class' => 'form-control'] ) !!}
	</div>
</div>
