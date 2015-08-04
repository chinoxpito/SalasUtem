@extends('asignaturas_cursadas.plantilla')
@section('contenido')
<p>

	<table>
		<td width=505><h2>Agrerar Nueva Asignaturas</h2></td>
	</table>
</p>
<h4>Nueva Asignatura</h4>
	<table class="table table-striped table-hover ">
  	<tbody>
			{!! Form::open(['route' => 'estudiantes.asignaturas_cursadas.store']) !!}
				
				<div class="form-group">
					<p1>Curso: </p1>{!! Form::select('curso_id',$curso)!!}
				
				</div>
				<div class="">
					{!! Form::hidden('estudiante_id',$estudiante->id)!!}
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