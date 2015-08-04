@extends('salas.plantilla')
@section('contenido')
<p>
  
  <table>
     <td width=505><h2>Registro de Salas</h2></td>
      
  </table>
</p>
<h4>Información de las salas "{{$sala->nombre}}" </h4>
  <table class="table table-striped table-hover ">
    <tbody>
          @if (!empty($sala))
            <tr height= 10>
              <td width=100>
                <h5><b>Nombre:</b></h5>
              </td>
              <td>{{$sala->nombre}}</td>
            <tr>
              <td width=200><h5><b>Pertenece al campus:</b></h5></td>
              <td>{{$campus->nombre }}</td>
            </tr>
            <tr>
              <td width=200><h5><b>Tipo de sala:</b></h5></td>
              <td>{{$sala->tipo_sala->nombre }}</td>
            </tr>
            <tr>
              <td width=100><h5><b>Descripcion:</b></h5></td>
              <td>{{$sala->descripcion}}</td>
          </tr>
          @else
          <p>
            No existe información de este Campus.
          </p>
          @endif
      </tbody>
  </table>
  <table>
    
      <td><a href="/salas" class="btn btn-default btn-sm">Volver</a>
          {!! Html::link(route('salas.edit', $sala->id), 'Editar', array('class' => 'btn btn-warning btn-sm')) !!}</td>
  </table>
@stop
