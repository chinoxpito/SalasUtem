@extends('periodos.plantilla')
@section('contenido')

<p>
	
	<table>
		<td width=505><h2>Registro de Periodos</h2></td>
	</table>
</p>
<h4>Nuevo Periodo</h4>
	<table class="table table-striped table-hover ">
  	<tbody>
			{!! Form::open(['route' => 'periodos.store']) !!}
				<div class="form-group">
					{!! Form::text('bloque', null, ['class' => 'form-control', 'placeholder'=>'Bloque']) !!}
				</div>
				<div class="form-group">
					{!! Form::text('inicio', null,['class'=>'form-control', 'placeholder'=>'Hora de inicio'])!!}
				</div>
				<div class="form-group">
					{!! Form::text('fin', null,['class'=>'form-control', 'placeholder'=>'Hora de fin'])!!}
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
		<td><a href="/periodos" class="btn btn-default btn-sm">Volver</a>
		<td><a href="/periodos/create" class="btn btn-warning btn-sm">Agregar Periodo</a></td>
	</table>
@stop
