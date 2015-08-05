@extends('estudiantes.plantilla')
@section('contenido')
<p>
	
	<table>
		<td width=505><h2>Registro de Estudiantes</h2></td>
	</table>
</p>
<h4>Actualizar datos del Estudiantes "{{$estudiante->nombres}}"</h4>
  <table class="table table-striped table-hover ">
    <tbody>
      {!! Form::model($estudiante, ['route' => ['estudiantes.update', $estudiante->id], 'method' => 'patch']) !!}
        
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
   
  </table>
@stop