@extends('asignaturas.plantilla')
@section('contenido')
<p>

	<table>
		<td width=505><h2>Agrerar Nueva Asignaturas</h2></td>
	</table>
</p>
<h4>Nueva Asignatura</h4>
	<table class="table table-striped table-hover ">
  	<tbody>
			{!! Form::open(['route' => 'asignaturas.store']) !!}
				<div class="form-group">
					{!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder'=>'Nombre de la asignatura']) !!}
				</div>
				<div class="form-group">
					{!! Form::text('codigo', null,['class'=>'form-control', 'placeholder'=>'Codigo'])!!}
				</div>
				<div class="form-group">
					{!! Form::text('descripcion', null,['class'=>'form-control', 'placeholder'=>'Descripcion'])!!}
				</div>
				<div class="form-group">
					<p1>Departamento: </p1>{!! Form::select('departamento_id',$departamento)!!}
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
		<td><a href="/asignaturas" class="btn btn-default btn-sm">Volver</a>		
	</table>
    
@stop