@if ($flotas->count() > 0)

<h1>Mis Flotas</h1>

<ul class="list-group">
	@foreach ($flotas as $flota)
		<li class="list-group-item">{!! HTML::linkRoute('flota.show', $flota->nombre, $flota->id ) !!}
</li>
	@endforeach
</ul>
@else
<h2>Todavia no a creado ninguna flota, puede hacerlo con el boton de abajo.</h2>
@endif

<h1>Mis Roles</h1>
	@foreach ($rolesFlotasDTO as $flota)
<h2>{!! HTML::linkRoute('flota.show', $flota->nombre, $flota->id ) !!}</h2>

<ul class="list-group">
		@foreach ($flota->roles as $id => $nombre)
		<li class="list-group-item">{!! HTML::linkRoute('rol.show', $nombre, $id ) !!}
</li>
		@endforeach
</ul>
	@endforeach

{!! HTML::linkRoute('flota.create', 'Crear una nueva flota', null, array('class' => 'btn btn-primary btn-lg') ) !!}
