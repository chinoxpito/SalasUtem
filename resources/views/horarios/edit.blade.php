@extends('horarios.plantilla')
@section('contenido')
<p>
	
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
					<p1>Sala: </p1>{!! Form::select('sala_id', $salas) !!}
				</div>
				<div class="form-group">
					<p1>Periodo: </p1>{!! Form::select('periodo_id', $periodos) !!}
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
	</table>
@stop
