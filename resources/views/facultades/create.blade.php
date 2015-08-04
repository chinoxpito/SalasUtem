@extends('facultades.plantilla')
@section('contenido')
<p>
	
	<table>
		<td width=505><h2>Registro de Facultades</h2></td>
	
	</table>
</p>
<h4>Nueva Facultad</h4>
	<table class="table table-striped table-hover ">
  	<tbody>
			{!! Form::open(['route' => 'facultades.store']) !!}
				<div class="form-group">
					{!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder'=>'Nombre de la facultad']) !!}
				</div>
				<!--<div class="form-group">
					{!! Form::text('campus_id', null,['class'=>'form-control', 'placeholder'=>'campus'])!!}
				</div>-->
				

				<div class="form-group">
					{!! Form::text('descripcion', null,['class'=>'form-control', 'placeholder'=>'Descripcion'])!!}
				</div>
				<div class="form-group">
				<p1>Campus: </p1>{!! Form::select('campus_id', $campus) !!}
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
		
		<td><a href="/facultades" class="btn btn-default btn-sm">Volver</a>
		<td><a href="/facultades/create" class="btn btn-warning btn-sm">Agregar Campus</a></td>
	</table>
@stop
