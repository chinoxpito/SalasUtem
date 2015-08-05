@extends('docentes.plantilla')
@section('contenido')
<p>
  
  <table>
    <td width=505>
      <h2>Registro de Docentes</h2>
    </td>
    
  </table>
</p>
<h4>Listado de Docentes</h4>
<table class="table table-striped table-hover ">
  <tbody>
    @foreach($docentes as $docente)
    <tr>
      <td width=710>{{ $docente->nombres}}</td>
      <td>
        {!! Html::link(route('docentes.show', $docente->id), 'Detalles', array('class' => 'label label-info')) !!}
        {!! Html::link(route('docentes.edit', $docente->id), 'Editar', array('class' => 'label label-success')) !!}
        <td>
          {!! Form::open(array('route' => array('docentes.destroy', $docente->id), 'method' => 'DELETE')) !!}
            <button class="label label-danger">Eliminar</button>
          {!! Form::close() !!}
        </td>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{!! $docentes->render() !!}
<p>
  @if(Session::has('message'))
    <div class="btn btn-info disabled{{ Session::get('class') }}">{{ Session::get('message')}}</div>
  @endif
</p>
<table>
  <td>
    <a href="/docentes/create" class="btn btn-warning btn-sm">Agregar Docente</a>
  </td>
  
    <div class="col-md-12">
</table>
@stop