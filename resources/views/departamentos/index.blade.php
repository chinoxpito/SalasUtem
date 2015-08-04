@extends('departamentos.plantilla')
@section('contenido')
<p>
  <table>
    <td width=505>
      <h2>Registro de Departamentos</h2>
    </td>
    
  </table>
</p>
<h4>Listado de Departamentos</h4>
<table class="table table-striped table-hover ">
  <tbody>
    @foreach($departamentos as $departamento)
    <tr>
      <td width=710>{{ $departamento->nombre }}</td>
      <td>
        {!! Html::link(route('departamentos.show', $departamento->id), 'Detalles', array('class' => 'label label-info')) !!}
        {!! Html::link(route('departamentos.edit', $departamento->id), 'Editar', array('class' => 'label label-success')) !!}
        <td>
          {!! Form::open(array('route' => array('departamentos.destroy', $departamento->id), 'method' => 'DELETE')) !!}
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
      <a href="/departamentos/create" class="btn btn-warning btn-sm">Agregar Departamentos</a>
    </td>
  
    <div class="col-md-12">
</table>
@stop
