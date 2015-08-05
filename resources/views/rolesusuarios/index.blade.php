@extends('rolesusuarios.plantilla')
@section('contenido')
<p>
  
  <table>
    <td width=505>
      <h2>Roles de Usuarios</h2>
    </td>
    
  </table>
</p>
<h4>Listado de roles de usuarios</h4>
<table class="table table-striped table-hover ">
  <tbody>
    @foreach($rolesusuarios as $rolusuario)
    <tr>
      <td width=710>{{ $rolusuario->rut}} {{ $rolusuario->rol->nombre}}</td>
      <td>             
        {!! Html::link(route('rolesusuarios.show', $rolusuario->id), 'Detalles', array('class' => 'label label-info')) !!}
        {!! Html::link(route('rolesusuarios.edit', $rolusuario->id), 'Editar', array('class' => 'label label-success')) !!}
        <td>
          {!! Form::open(array('route' => array('rolesusuarios.destroy', $rolusuario->id), 'method' => 'DELETE')) !!}
            <button class="label label-danger">Eliminar</button>
          {!! Form::close() !!}
        </td>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{!! $rolesusuarios->render() !!}
<p>
  @if(Session::has('message'))
    <div class="btn btn-info disabled{{ Session::get('class') }}">{{ Session::get('message')}}</div>
  @endif
</p>
<table>
  <td>
      <a href="/rolesusuarios/create" class="btn btn-warning btn-sm">Agregar Roles</a>
    </td>
  
    <div class="col-md-12">
</table>
@stop
