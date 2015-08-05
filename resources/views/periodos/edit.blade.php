@extends('periodos.plantilla')
@section('contenido')
<p>
	
	<table>
		<td width=505><h2>Registro de periodos</h2></td>
	</table>
</p>
  <h4>Actualizar periodo "{{$periodo->bloque}}"</h4>
	<table class="table table-striped table-hover ">
  	<tbody>
    	{!! Form::model($periodo, ['route' => ['periodos.update', $periodo->id], 'method' => 'patch']) !!}
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
	</table>
@stop
