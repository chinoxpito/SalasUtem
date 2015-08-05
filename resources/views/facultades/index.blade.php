@extends('facultades.plantilla')
@section('contenido')
<p>
  
  <table>
    <td width=505>
      <h2>Registro de Facultades</h2>
    </td>
    
  </table>
</p>
<h4>Listado de Facultades</h4>
<table class="table table-striped table-hover ">
  <tbody>
    @foreach($facultades as $facultad)
    <tr>
      <td width=710>{{ $facultad->nombre }}</td>
      <td>
        {!! Html::link(route('facultades.show', $facultad->id), 'Detalles', array('class' => 'label label-info')) !!}
        {!! Html::link(route('facultades.edit', $facultad->id), 'Editar', array('class' => 'label label-success')) !!}
        <td>
          {!! Form::open(array('route' => array('facultades.destroy', $facultad->id), 'method' => 'DELETE')) !!}
            <button class="label label-danger">Eliminar</button>
          {!! Form::close() !!}
        </td>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{!! $facultades->render() !!}

<p>
  @if(Session::has('message'))
    <div class="btn btn-info disabled{{ Session::get('class') }}">{{ Session::get('message')}}</div>
  @endif
</p>
<table>
  <td>
      <a href="/facultades/create" class="btn btn-warning btn-sm">Agregar Facultad</a>
    </td>
  
    <div class="col-md-12">
</table>
@stop
