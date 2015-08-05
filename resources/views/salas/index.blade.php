@extends('salas.plantilla')
@section('contenido')
<p>
  
  <table>
    <td width=505>
      <h2>Registro de Salas</h2>
    </td>
    
  </table>
</p>
<h4>Listado de Salas</h4>
<table class="table table-striped table-hover ">
  <tbody>
    @foreach($salas as $sala)
    <tr>
      <td width=710>{{ $sala->nombre }}</td>
      <td>
        {!! Html::link(route('salas.show', $sala->id), 'Detalles', array('class' => 'label label-info')) !!}
        {!! Html::link(route('salas.edit', $sala->id), 'Editar', array('class' => 'label label-success')) !!}
        <td>
          {!! Form::open(array('route' => array('salas.destroy', $sala->id), 'method' => 'DELETE')) !!}
            <button class="label label-danger">Eliminar</button>
          {!! Form::close() !!}
        </td>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{!! $salas->render() !!}
<p>
  @if(Session::has('message'))
    <div class="btn btn-info disabled{{ Session::get('class') }}">{{ Session::get('message')}}</div>
  @endif
</p>
<table>
  <td>
      <a href="/salas/create" class="btn btn-warning btn-sm">Agregar Salas</a>
    </td>
  
    <div class="col-md-12">
</table>
@stop
