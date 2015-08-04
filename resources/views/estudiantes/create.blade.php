@extends('estudiantes.plantilla')
@section('contenido')
<p>
	
	<table>
		<td width=505><h2>Registro de Estudiantes</h2></td>
	</table>
</p>
<h4>Nuevo Estudiante</h4>
	<table class="table table-striped table-hover ">
  	<tbody>
			{!! Form::open(['route' => 'estudiantes.store']) !!}
				<div class="form-group">
					{!! Form::text('rut', null,['class'=>'form-control', 'placeholder'=>'RUT'])!!}
				</div>
				<div class="form-group">
					{!! Form::text('nombres', null,['class'=>'form-control', 'placeholder'=>'Nombres'])!!}
				</div>
				<div class="form-group">
					{!! Form::text('apellidos', null,['class'=>'form-control', 'placeholder'=>'Apellidos'])!!}
				</div>
				<div class="form-group">
					{!! Form::text('email', null,['class'=>'form-control', 'placeholder'=>'E-mail'])!!}
				</div>
				<div class="form-group">
					<p1>Carrera: </p1>{!! Form::select('carrera_id',$carrera)!!}
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
		<td><a href="/estudiantes" class="btn btn-default btn-sm">Volver</a>
		<td><a href="/estudiantes/create" class="btn btn-warning btn-sm">Agregar Estudiante</a></td>
	</table>
@stop
