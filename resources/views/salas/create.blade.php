@extends('salas.plantilla')
@section('contenido')
<p>
	
	<table>
		<td width=505><h2>Registro de Salas</h2></td>
	
	</table>
</p>
<h4>Nueva Sala</h4>
	<table class="table table-striped table-hover ">
  	<tbody>
			{!! Form::open(['route' => 'salas.store']) !!}
				<div class="form-group">
					{!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder'=>'Nombre de la sala']) !!}
				</div>
				<div class="form-group">
					{!! Form::text('descripcion', null,['class'=>'form-control', 'placeholder'=>'Descripcion'])!!}
				</div>
				<div class="form-group">
				<p1>Campus: </p1>{!! Form::select('campus_id', $campus) !!}
				</div>
				<div class="form-group">
				<p1>Tipo de sala: </p1>{!! Form::select('tipos_salas_id', $tipos_salas) !!}
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
		
		<td><a href="/salas" class="btn btn-default btn-sm">Volver</a>
	</table>
@stop
