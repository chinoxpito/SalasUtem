@extends('funcionarios.plantilla')
@section('contenido')
<p>
	
	<table>
		<td width=505><h2>Registro de Funcionarios</h2></td>
		
	</table>
</p>
<h4>Actualizar datos del Funcionario "{{$funcionario->nombres}}"</h4>
  <table class="table table-striped table-hover ">
    <tbody>
      {!! Form::model($funcionario, ['route' => ['funcionarios.update', $funcionario->id], 'method' => 'patch']) !!}
      <div class="form-group">
        {!! Form::text('rut', null,['class'=>'form-control', 'placeholder'=>'RUT'])!!}
      </div>
      <div class="form-group">
        {!! Form::text('nombres', null,['class'=>'form-control', 'placeholder'=>'Nombres'])!!}
      </div>
      <div class="form-group">
        {!! Form::text('apellidos', null,['class'=>'form-control', 'placeholder'=>'Apellidos'])!!}
      </div>
      <div class="form-group">
          <p1>Departamento: </p1>{!! Form::select('departamento_id', $departamentos) !!}
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
    
    <td><a href="/funcionarios" class="btn btn-default btn-sm">Volver</a>
    
  </table>
@stop