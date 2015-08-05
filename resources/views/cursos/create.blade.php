@extends('cursos.plantilla')
@section('contenido')
@if (count($errors) > 0)
	                    <div class="alert alert-danger">
	                      <ul>
	                        @foreach ($errors->all() as $error)
	                           <li>{{ $error }}</li>
                          @endforeach
	                      </ul>
                      </div>
                    @endif
<p>
  
	<table>
		<td width=505><h2>Registro de Cursos</h2></td>
	</table>
</p>
<h4>Nuevo curso</h4>
	<table class="table table-striped table-hover ">
  	<tbody>
		{!! Form::open(['route' => 'cursos.store']) !!}
				
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
