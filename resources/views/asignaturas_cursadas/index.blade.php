@extends('asignaturas_cursadas.plantilla')
@section('contenido')
<p>
  
  <table>
    <td width=505>
      <h2>Asignar Asignaturas</h2>
    </td>
    
  </table>
</p>
<table class="table table-striped table-hover ">
  <tbody>
    @foreach($estudiante->cursos as $curso)
    <tr>
      <td width=710>{{ $curso->asignatura->nombre }}</td>
      <td>
        {!! Form::open(array('route'=> array('estudiantes.asignaturas_cursadas.destroy',$estudiante->id, $curso->id), 'method' => 'DELETE')) !!}
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
    <td><a href="/estudiantes" class="btn btn-default btn-sm">Volver</a>
    {!! Html::link(route('estudiantes.asignaturas_cursadas.create', $estudiante->id), 'Agregar asignatura', array('class' => 'label label-info')) !!}
  </td>
  
    <div class="col-md-12">
</table>
@stop
