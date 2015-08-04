@extends('roles.plantilla')
@section('contenido')
<p>
	
	<table>
		<td width=505><h2>Registro de Roles</h2></td>
	</table>
</p>
<h4>Actualizar periodo "{{$rol->nombre}}"</h4>
	<table class="table table-striped table-hover ">
  	<tbody>
			{!! Form::model($rol, ['route' => ['roles.update', $rol->id], 'method' => 'patch']) !!}
				<div class="form-group">
					{!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder'=>'Nombre']) !!}
				</div>
				<div class="form-group">
					{!! Form::text('descripcion', null,['class'=>'form-control', 'placeholder'=>'Descripcion'])!!}
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
		<td><a href="/roles" class="btn btn-default btn-sm">Volver</a>
		<td><a href="/roles/create" class="btn btn-warning btn-sm">Agregar Rol</a></td>
	</table>
@stop
