@extends('campus.plantilla')
@section('contenido')
<p>
  
  <table>
    <td width=505>
      <h2>Registro de Campus</h2>
    </td>
    
  </table>
</p>
<h4>Listado de Campus</h4>
<table class="table table-striped table-hover ">
  <tbody>
    @foreach($campus as $campu)
    <tr>
      <td width=710>{{ $campu->nombre }}</td>
      <td>
        {!! Html::link(route('campus.show', $campu->id), 'Detalles', array('class' => 'label label-info')) !!}
        {!! Html::link(route('campus.edit', $campu->id), 'Editar', array('class' => 'label label-success')) !!}
        <td>
          {!! Form::open(array('route' => array('campus.destroy', $campu->id), 'method' => 'DELETE')) !!}
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
      <a href="/campus/create" class="btn btn-warning btn-sm">Agregar Campus</a>
      
    </td>
    <div class="col-md-12">
</table>
@stop