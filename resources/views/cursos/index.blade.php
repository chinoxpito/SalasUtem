@extends('cursos.plantilla')
@section('contenido')
<p>
  
  <table>
    <td width=505>
      <h2>Listado de cursos</h2>
    </td>
    
  </table>
</p>
<table class="table table-striped table-hover ">
  <tbody>
    @foreach($cursos as $curso)
    <tr>
      <td width=710>{{ $curso->asignatura->nombre}} {{ $curso->seccion}}</td>
      
      <td>
        {!! Html::link(route('cursos.show', $curso->id), 'Detalles', array('class' => 'label label-info')) !!}
        {!! Html::link(route('cursos.edit', $curso->id), 'Editar', array('class' => 'label label-success')) !!}
        <td>
          {!! Form::open(array('route' => array('cursos.destroy', $curso->id), 'method' => 'DELETE')) !!}
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
      <a href="/cursos/create" class="btn btn-warning btn-sm">Agregar cursos</a>
    </td>
  
    <div class="col-md-12">
</table>
@stop
