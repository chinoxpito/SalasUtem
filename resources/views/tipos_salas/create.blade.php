@extends('tipos_salas.plantilla')
@section('contenido')
<p>
	
	<table>
		<td width=505><h2>Registro de Tipos de salas</h2></td>
	</table>
</p>
<h4>Nuevo tipo de sala</h4>
	<table class="table table-striped table-hover ">
  	<tbody>
			{!! Form::open(['route' => 'tipos_salas.store']) !!}
				<div class="form-group">
					{!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder'=>'Nombre']) !!}
				</div>
				<div class="form-group">
					{!! Form::text('descripcion', null,['class'=>'form-control', 'placeholder'=>'Descripcion'])!!}
				</div>
				
				<div class="form-group">
					{!! Form::submit('Agregar', ["class" => "btn btn-success btn-block"]) !!}
				</div>
			{!! Form::close() !!}
      <p>
	    	@if(Session::has('message'))
          <div class="btn btn-success disabled{{ Session::get('class') }}">{{ Session::get('message')}}</div>
        @endif
      </p>
      <table>
		<td><a href="/tipos_salas" class="btn btn-default btn-sm">Volver</a>
		<td><a href="/tipos_salas/create" class="btn btn-warning btn-sm">Agregar tipo de sala</a></td>
	</table>
@stop
