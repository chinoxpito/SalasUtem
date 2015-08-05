@extends('tipos_salas.plantilla')
@section('contenido')
<p>
	
	<table>
		<td width=505><h2>Registro de Tipos de salas</h2></td>
	</table>
</p>
<h4>Actualizar tipo de sala "{{$tipo_sala->nombre}}"</h4>
	<table class="table table-striped table-hover ">
  	<tbody>
			{!! Form::model($tipo_sala, ['route' => ['tipos_salas.update', $tipo_sala->id], 'method' => 'patch']) !!}
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
	</table>
@stop
