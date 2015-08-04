@extends('periodos.plantilla')
@section('contenido')

<p>
  
  <table>
    <td width=505>
      <h2>PERIODOS</h2>
    </td>
    
  </table>
</p>
<h4>Listado de periodos</h4>
<table class="table table-striped table-hover ">
  <tbody>
    @foreach($periodos as $periodo)
    <tr>
      <td width=710>Periodo {{ $periodo->bloque }}</td>
      <td>
        {!! Html::link(route('periodos.show', $periodo->id), 'Detalles', array('class' => 'label label-info')) !!}
        {!! Html::link(route('periodos.edit', $periodo->id), 'Editar', array('class' => 'label label-success')) !!}
        <td>
          {!! Form::open(array('route' => array('periodos.destroy', $periodo->id), 'method' => 'DELETE')) !!}
            <button class="label label-danger">Eliminar</button>
          {!! Form::close() !!}
        </td>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{!! $periodos->render() !!}
<p>
  @if(Session::has('message'))
    <div class="btn btn-info disabled{{ Session::get('class') }}">{{ Session::get('message')}}</div>
  @endif
</p>

<table>
  <td>
      <ul id="pagination-demo" class="pagination-sm"></ul> <a href="/periodos/create" class="btn btn-warning btn-sm">Agregar periodos</a>
    </td>
  
    <div class="col-md-12">
</table>
@stop
