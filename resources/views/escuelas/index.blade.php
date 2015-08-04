@extends('escuelas.plantilla')
@section('contenido')
<p>
  
  <table>
    <td width=505>
      <h2>Registro de Escuelas</h2>
    </td>
    
  </table>
</p>
<h4>Listado de Escuelas</h4>
<table class="table table-striped table-hover ">
  <tbody>
    @foreach($escuelas as $escuela)
    <tr>
      <td width=710>{{ $escuela->nombre }}</td>
      <td>
        {!! Html::link(route('escuelas.show', $escuela->id), 'Detalles', array('class' => 'label label-info')) !!}
        {!! Html::link(route('escuelas.edit', $escuela->id), 'Editar', array('class' => 'label label-success')) !!}
        <td>
          {!! Form::open(array('route' => array('escuelas.destroy', $escuela->id), 'method' => 'DELETE')) !!}
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
      <a href="/escuelas/create" class="btn btn-warning btn-sm">Agregar Escuela</a>
    </td>
  
    <div class="col-md-12">
</table>
@stop
