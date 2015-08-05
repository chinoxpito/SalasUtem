@extends('roles.plantilla')
@section('contenido')
<p>
  
  <table>
    <td width=505>
      <h2>Roles</h2>
    </td>
    
  </table>
</p>
<h4>Listado de roles</h4>
<table class="table table-striped table-hover ">
  <tbody>
    @foreach($roles as $rol)
    <tr>
      <td width=710>{{ $rol->nombre }}</td>
      <td>
        {!! Html::link(route('roles.show', $rol->id), 'Detalles', array('class' => 'label label-info')) !!}
        <td>
          {!! Form::open(array('route' => array('roles.destroy', $rol->id), 'method' => 'DELETE')) !!}
            <button class="label label-danger">Eliminar</button>
          {!! Form::close() !!}
        </td>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{!! $roles->render() !!}
<p>
  @if(Session::has('message'))
    <div class="btn btn-info disabled{{ Session::get('class') }}">{{ Session::get('message')}}</div>
  @endif
</p>
<table>
  <td>
      <a href="/roles/create" class="btn btn-warning btn-sm">Agregar Roles</a>
    </td>
  
    <div class="col-md-12">
</table>
@stop
