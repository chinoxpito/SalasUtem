@extends('horarios.plantilla')
@section('contenido')
<p>
	<ul class="nav nav-tabs">
    <li class=""><a aria-expanded="true" href="/admin/menu" data-toggle="tab">Principal</a></li>
    <li class="active"><a aria-expanded="false" href="/asignaturas" data-toggle="tab">Asignaturas</a></li>
    <li class=""><a aria-expanded="false" href="/cursos" data-toggle="tab">Cursos</a></li>
    <li class=""><a aria-expanded="false" href="/horarios" data-toggle="tab">Horarios</a></li>
    <li class=""><a aria-expanded="false" href="/periodos" data-toggle="tab">Periodos</a></li>
    <li class=""><a aria-expanded="false" href="/asignaturascursadas" data-toggle="tab">Asignaturas Cursadas</a></li>
    </ul>
	<table>
		<td width=505><h2>Registro de Horarios</h2></td>
	</table>
</p>
  <h4>Actualizar  horario "{{$horario->fecha}}"</h4>
	<table class="table table-striped table-hover ">
  	<tbody>
    	{!! Form::model($horario, ['route' => ['horarios.update', $horario->id], 'method' => 'patch']) !!}
			<div class="form-group">
					{!! Form::text('fecha', null, ['class' => 'form-control', 'placeholder'=>'Fecha del Horario']) !!}
				</div>
				<div class="form-group">
					<p1>Sala: </p1>{!! Form::select('sala_id', $sala) !!}
				</div>
				<div class="form-group">
					<p1>Periodo: </p1>{!! Form::select('periodo_id', $periodo) !!}
				</div>
				<div class="form-group">
					<p1>Curso: </p1>{!! Form::select('curso_id', $curso) !!}
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
		<td><a href="/horarios" class="btn btn-default btn-sm">Volver</a>
		<a href="/horarios/create" class="btn btn-warning btn-sm">Agregar horario</a></td>
	</table>
@stop
