@extends('asignaturas.plantilla')
@section('contenido')
<p>

	<table>
		<td width=505><h2>Registro de Asignaturas</h2></td>
		
</table>
</p>
  <h4>Actualizar datos de la Asignatura "{{$asignatura->nombre}}"</h4>
	<table class="table table-striped table-hover ">
  	<tbody>
    	{!! Form::model($asignatura, ['route' => ['asignaturas.update', $asignatura->id], 'method' => 'patch']) !!}
			<div class="form-group">
				{!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder'=>'Nombre de la asignatura']) !!}
			</div>
			<div class="form-group">
				{!! Form::text('codigo', null,['class'=>'form-control', 'placeholder'=>'Codigo de asignatura'])!!}
			</div>
			<div class="form-group">
				{!! Form::text('descripcion', null,['class'=>'form-control', 'placeholder'=>'Descripcion'])!!}
			</div>
			<div class="form-group">
				<p1>Departamento: </p1>{!! Form::select('departamento_id',$departamentos)!!}
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
		
		<td><a href="/asignaturas" class="btn btn-default btn-sm">Volver</a>
		<a href="/asignaturas/create" class="btn btn-warning btn-sm">Agregar asignatura</a></td>
	</table>
@stop
