@extends('asignaturas.plantilla')
@section('contenido')
<p>
	
	<table>
	   <td width=505><h2>Registro de Asignaturas</h2></td>
	 </table>
</p>
<h4>Información de {{$asignatura->nombre}} </h4>
  <table class="table table-striped table-hover ">
    <tbody>
          @if (!empty($asignatura))
            <tr height= 10>
              <td width=100>
                <h5><b>Nombre:</b></h5>
              </td>
              <td>{{$asignatura->nombre}}</td>
            <tr>
              <td width=250><h5><b>Pertenece al departamento:</b></h5></td>
              <td>{{$departamento->nombre }}</td>
            </tr>
            <tr>
              <td width=100><h5><b>Codigo Asignatura:</b></h5></td>
              <td>{{$asignatura->codigo}}</td>
          </tr>
          <tr>
              <td width=250><h5><b>Descripcion:</b></h5></td>
              <td>{{$asignatura->descripcion}}</td>
            </tr>
          @else
          <p>
            No existe información de esta asignatura.
          </p>
          @endif
      </tbody>
  </table>
  <table>
    <td><a href="/asignaturas" class="btn btn-default btn-sm">Volver</a>
            {!! Html::link(route('asignaturas.edit', $asignatura->id), 'Editar', array('class' => 'btn btn-warning btn-sm')) !!}</td>
  </table>
@stop
