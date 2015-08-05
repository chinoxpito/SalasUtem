@extends('asignaturas.plantilla')
@section('contenido')
<p>
  
  <table>
    <td width=505>
      <h2>Asignaturas Actuales</h2>
    </td>
    
  </table>
</p>
<table class="table table-striped table-hover ">
  <tbody>
    @foreach($asignaturas as $asignatura)
    <tr>
      <td width=710>{{ $asignatura->nombre }}</td>
      <td>
        {!! Html::link(route('asignaturas.show', $asignatura->id), 'Detalles', array('class' => 'label label-info')) !!}
        {!! Html::link(route('asignaturas.edit', $asignatura->id), 'Editar', array('class' => 'label label-success')) !!}
        <td>
          {!! Form::open(array('route' => array('asignaturas.destroy', $asignatura->id), 'method' => 'DELETE')) !!}
            <button class="label label-danger">Eliminar</button>
          {!! Form::close() !!}
        </td>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{!! $asignaturas->render() !!}
<p>
  @if(Session::has('message'))
    <div class="btn btn-info disabled{{ Session::get('class') }}">{{ Session::get('message')}}</div>
  @endif
</p>
<table>
  <td>
    <a href="/asignaturas/create" class="btn btn-warning btn-sm">Agregar Asignatura</a>
  </td>
  
    <div class="col-md-12">
</table>
@stop
