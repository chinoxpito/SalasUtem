@extends('horarios.plantilla')
@section('contenido')
<p>
  
  <table>
    <td width=505>
      <h2>HORARIO</h2>
    </td>
</table>
</p>
<h4>Tu horario para este día</h4>
<table class="table table-striped table-hover ">
  <tbody>
    @foreach($horarios as $horario)
    <tr>
      <td width=450>{{ $horario->fecha }}</td>
      <td>
        {!! Html::link(route('horarios.show', $horario->id), 'Detalles', array('class' => 'label label-info')) !!}
        {!! Html::link(route('horarios.edit', $horario->id), 'Editar', array('class' => 'label label-success')) !!}
        <td>
          {!! Form::open(array('route' => array('horarios.destroy', $horario->id), 'method' => 'DELETE')) !!}
            <button class="label label-danger">Eliminar</button>
          {!! Form::close() !!}
        </td>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{!! $horarios->render() !!}
<p>
  @if(Session::has('message'))
    <div class="btn btn-info disabled{{ Session::get('class') }}">{{ Session::get('message')}}</div>
  @endif
</p>
<table>
  <td>
      <a href="/horarios/create" class="btn btn-warning btn-sm">Agregar horarios</a>
    </td>
  
    <div class="col-md-12">
</table>
@stop
