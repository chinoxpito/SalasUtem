@extends('tipos_salas.plantilla')
@section('contenido')
<p>
  
  <table>
    <td width=505>
      <h2>Tipos De Salas</h2>
    </td>
    
  </table>
</p>
<h4>Listado de tipos de salas</h4>
<table class="table table-striped table-hover ">
  <tbody>
    @foreach($tipos_salas as $tipo_sala)
    <tr>
      <td width=710>{{ $tipo_sala->nombre }}</td>
      <td>
        {!! Html::link(route('tipos_salas.show', $tipo_sala->id), 'Detalles', array('class' => 'label label-info')) !!}
        {!! Html::link(route('tipos_salas.edit', $tipo_sala->id), 'Editar', array('class' => 'label label-success')) !!}
        <td>
          {!! Form::open(array('route' => array('tipos_salas.destroy', $tipo_sala->id), 'method' => 'DELETE')) !!}
            <button class="label label-danger">Eliminar</button>
          {!! Form::close() !!}
        </td>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{!! $tipos_salas->render() !!}
<p>
  @if(Session::has('message'))
    <div class="btn btn-info disabled{{ Session::get('class') }}">{{ Session::get('message')}}</div>
  @endif
</p>
<table>
  <td>
      <a href="/tipos_salas/create" class="btn btn-warning btn-sm">Agregar tipo de sala</a>
    </td>
  
    <div class="col-md-12">
</table>
@stop
