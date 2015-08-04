@extends('escuelas.plantilla')
@section('contenido')
<p>
	
	<table>
	   <td width=505><h2>Registro de Escuelas</h2></td>
  </table>
</p>
<h4>Información de la escuela "{{$escuela->nombre}}" </h4>
  <table class="table table-striped table-hover ">
    <tbody>
          @if (!empty($escuela))
            <tr height= 10>
              <td width=100>
                <h5><b>Nombre:</b></h5>
              </td>
              <td>{{$escuela->nombre}}</td>
            <tr>
              <td width=250><h5><b>Pertenece al departamento:</b></h5></td>
              <td>{{$departamento->nombre }}</td>
            </tr>
            <tr>
              <td width=100><h5><b>Descripcion:</b></h5></td>
              <td>{{$escuela->descripcion}}</td>
          </tr>
          @else
          <p>
            No existe información de esta Escuela.
          </p>
          @endif
      </tbody>
  </table>
  <table>
     <td><a href="/escuelas" class="btn btn-default btn-sm">Volver</a>
          {!! Html::link(route('escuelas.edit', $escuela->id), 'Editar', array('class' => 'btn btn-warning btn-sm')) !!}</td>
  </table>
@stop
