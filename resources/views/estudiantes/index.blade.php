@extends('estudiantes.plantilla')
@section('contenido')
<p>
  
  <table>
    <td width=505>
      <h2>Registro de Estudiantes</h2>
    </td>
    
  </table>
</p>
<h4>Listado de Estudiantes</h4>
<table class="table table-striped table-hover ">
  <tbody>
    @foreach($estudiantes as $estudiante)
    <tr>
      <td width=530>{{ $estudiante->nombres }}</td>
      <td>
        {!! Html::link(route('estudiantes.show', $estudiante->id), 'Detalles', array('class' => 'label label-info')) !!}
        
        {!! Html::link(route('estudiantes.edit', $estudiante->id), 'Editar', array('class' => 'label label-success')) !!}
        {!! Html::link(route('estudiantes.asignaturas_cursadas.index', $estudiante->id), 'Asignar Asignatura', array('class' => 'label label-info')) !!}
        <td>
          {!! Form::open(array('route' => array('estudiantes.destroy', $estudiante->id), 'method' => 'DELETE')) !!}
            <button class="label label-danger">Eliminar</button>
          {!! Form::close() !!}
        </td>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{!! $estudiantes->render() !!}
<p>
  @if(Session::has('message'))
    <div class="btn btn-info disabled{{ Session::get('class') }}">{{ Session::get('message')}}</div>
  @endif
</p>
<table>
  <td>
      <a href="/estudiantes/create" class="btn btn-warning btn-sm">Agregar Estudiantes</a>
    </td>
  
    <div class="col-md-12">
</table>
@stop
