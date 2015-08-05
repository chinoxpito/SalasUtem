@extends('carreras.plantilla')
@section('contenido')
<p>
	
	<table>
		<td width=505><h2>Registro de Carreras</h2></td>
	</table>
</p>
  <h4>Actualizar datos de la carrera "{{$carrera->nombre}}"</h4>
	<table class="table table-striped table-hover ">
  	<tbody>
    	{!! Form::model($carrera, ['route' => ['carreras.update', $carrera->id], 'method' => 'patch']) !!}
			<div class="form-group">
				{!! Form::text('codigo', null, ['class' => 'form-control', 'placeholder'=>'Codigo de la Carrera']) !!}
			</div>
			<div class="form-group">
				{!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder'=>'Nombre de la Carrera']) !!}
			</div>
			<div class="form-group">
				{!! Form::text('descripcion', null,['class'=>'form-control', 'placeholder'=>'Descripcion'])!!}
			</div>
			<div class="form-group">
				<p1>Escuela: </p1>{!! Form::select('escuela_id',$escuelas)!!}
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
		<td><a href="/carreras" class="btn btn-default btn-sm">Volver</a>
		
	</table>
@stop
