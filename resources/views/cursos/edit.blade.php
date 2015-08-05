@extends('cursos.plantilla')
@section('contenido')
<p>
  
	<table>
		<td width=505><h2>Registro de Cursos</h2></td>
</table>
</p>
  <h4>Actualizar datos del curso "{{$curso->asignatura->nombre}}"</h4>
	<table class="table table-striped table-hover ">
  	<tbody>
    	{!! Form::model($curso, ['route' => ['cursos.update', $curso->id], 'method' => 'patch']) !!}
			<div class="form-group">
				{!! Form::text('semestre', null, ['class' => 'form-control', 'placeholder'=>'Semestre al que pertenece']) !!}
			</div>
			<div class="form-group">
				{!! Form::text('anio', null,['class'=>'form-control', 'placeholder'=>'Año academico'])!!}
			</div>
			<div class="form-group">
				{!! Form::text('seccion', null,['class'=>'form-control', 'placeholder'=>'Seccion'])!!}
			</div>
			<div class="form-group">
				<p1>Asignatura: </p1>{!! Form::select('asignatura_id',$asignatura)!!}
			</div>
			<div class="form-group">
				<p1>Docente: </p1>{!! Form::select('docente_id',$docente)!!}
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
		<td><a href="/cursos" class="btn btn-default btn-sm">Volver</a>
</table>
@stop
