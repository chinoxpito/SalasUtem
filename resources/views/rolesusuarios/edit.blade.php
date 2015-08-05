@extends('rolesusuarios.plantilla')
@section('contenido')
<p>
	
	<table>
		<td width=505><h2>Registro de rolesusuarios</h2></td>
	</table>
</p>
<h4>Actualizar periodo "{{$rolusuario->nombre}}"</h4>
	<table class="table table-striped table-hover ">
  	<tbody>
			{!! Form::model($rolusuario, ['route' => ['rolesusuarios.update', $rolusuario->id], 'method' => 'patch']) !!}
				<div class="form-group">
					{!! Form::text('rut', null, ['class' => 'form-controlusuario', 'placeholder'=>'Rut']) !!}
				</div>
				<div class="form-group">
					<p1>Rol: </p1>{!! Form::select('rol_id',$rol)!!}
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
		<td><a href="/rolesusuarios" class="btn btn-default btn-sm">Volver</a>
		
	</table>
@stop
