@extends('carreras.plantilla')
@section('contenido')
<p>
  
  <table>
    <td width=505>
      <h2>Registro de Carreras</h2>
    </td>
  </table>
</p>
<h4>Listado de Carreras</h4>
<table class="table table-striped table-hover ">
  <tbody>
    @foreach($carreras as $carrera)
    <tr>
      <td width=200>{{ $carrera->nombre }}</td>
      <td width=480> Codigo: {{$carrera->codigo }}</td>
      <td>
        {!! Html::link(route('carreras.show', $carrera->id), 'Detalles', array('class' => 'label label-info')) !!}
        {!! Html::link(route('carreras.edit', $carrera->id), 'Editar', array('class' => 'label label-success')) !!}
        <td>
          {!! Form::open(array('route' => array('carreras.destroy', $carrera->id), 'method' => 'DELETE')) !!}
            <button class="label label-danger">Eliminar</button>
          {!! Form::close() !!}
        </td>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<p>
  @if(Session::has('message'))
    <div class="btn btn-info disabled{{ Session::get('class') }}">{{ Session::get('message')}}</div>
  @endif
</p>
<table>
   <td>
      <a href="/carreras/create" class="btn btn-warning btn-sm">Agregar Carrera</a>
    </td>
  
    <div class="col-md-12">
</table>
@stop
