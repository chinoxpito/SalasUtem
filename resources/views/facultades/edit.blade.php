@extends('facultades.plantilla')
@section('contenido')
<p>
	
	<table>
		<td width=505><h2>Registro de Facultades</h2></td>
		
</table>
</p>
  <h4>Actualizar datos de la Facultad "{{$facultad->nombre}}"</h4>
	<table class="table table-striped table-hover ">
  	<tbody>
    	{!! Form::model($facultad, ['route' => ['facultades.update', $facultad->id], 'method' => 'patch']) !!}
			<div class="form-group">
				{!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder'=>'Nombre de la Facultad']) !!}
			</div>
			
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
		
</table>
@stop
