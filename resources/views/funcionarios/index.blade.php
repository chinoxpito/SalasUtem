@extends('funcionarios.plantilla')
@section('contenido')
<p>
  
  <table>
    <td width=505>
      <h2>Registro de Funcionarios</h2>
    </td>
    
  </table>
</p>
<h4>Listado de Funcionarios</h4>
<table class="table table-striped table-hover ">
  <tbody>
    @foreach($funcionarios as $funcionario)
    <tr>
      <td width=710>{{ $funcionario->nombres }}</td>
      <td>
        {!! Html::link(route('funcionarios.show', $funcionario->id), 'Detalles', array('class' => 'label label-info')) !!}
        {!! Html::link(route('funcionarios.edit', $funcionario->id), 'Editar', array('class' => 'label label-success')) !!}
        <td>
          {!! Form::open(array('route' => array('funcionarios.destroy', $funcionario->id), 'method' => 'DELETE')) !!}
            <button class="label label-danger">Eliminar</button>
          {!! Form::close() !!}
        </td>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{!! $funcionarios->render() !!}
<p>
  @if(Session::has('message'))
    <div class="btn btn-info disabled{{ Session::get('class') }}">{{ Session::get('message')}}</div>
  @endif
</p>
<table>
  <td>
      <a href="/funcionarios/create" class="btn btn-warning btn-sm">Agregar Funcionario</a>
    </td>
  
    <div class="col-md-12">
</table>
@stop
