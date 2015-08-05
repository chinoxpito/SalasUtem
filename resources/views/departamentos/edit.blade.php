@extends('departamentos.plantilla')
@section('contenido')
<p>
	
	<table>
		<td width=505><h2>Registro de Departamentos</h2></td>
</table>
</p>
  <h4>Actualizar datos del Departamento "{{$departamento->nombre}}"</h4>
	<table class="table table-striped table-hover ">
  	<tbody>
  		{!! Form::model($departamento, ['route' => ['departamentos.update', $departamento->id], 'method' => 'patch']) !!}
    	
				<div class="form-group">
					{!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder'=>'Nombre del Departamento']) !!}
				</div>
				<div class="form-group">
					{!! Form::text('descripcion', null,['class'=>'form-control', 'placeholder'=>'Descripcion'])!!}
				</div>
				<div class="form-group">
					<p1>Facultad: </p1>{!! Form::select('facultad_id',$facultades)!!}
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
		<td><a href="/departamentos" class="btn btn-default btn-sm">Volver</a>
		
	</table>
@stop
