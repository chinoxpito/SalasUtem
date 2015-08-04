@extends('facultades.plantilla')
@section('contenido')
<p>
	
	<table>
	   <td width=505><h2>Registro de Facultades</h2></td>
	    
  </table>
</p>
<h4>Información de la Facultad "{{$facultad->nombre}}" </h4>
  <table class="table table-striped table-hover ">
    <tbody>
          @if (!empty($facultad))
            <tr height= 10>
              <td width=100>
                <h5><b>Nombre:</b></h5>
              </td>
              <td>{{$facultad->nombre}}</td>
            <tr>
              <td width=200><h5><b>Pertenece al campus:</b></h5></td>
              <td>{{$campus->nombre }}</td>
            </tr>
            <tr>
              <td width=100><h5><b>Descripcion:</b></h5></td>
              <td>{{$facultad->descripcion}}</td>
          </tr>
          @else
          <p>
            No existe información de este Campus.
          </p>
          @endif
      </tbody>
  </table>
  <table>
    
      <td><a href="/facultades" class="btn btn-default btn-sm">Volver</a>
          {!! Html::link(route('facultades.edit', $facultad->id), 'Editar', array('class' => 'btn btn-warning btn-sm')) !!}</td>
  </table>
@stop
