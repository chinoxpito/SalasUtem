@extends('cursos.plantilla')
@section('contenido')
<p>
  
	<table>
	   <td width=505><h2>Registro de cursos</h2></td>
  </table>
</p>
<h4>Información del curso "{{$curso->asignatura->nombre}}" </h4>
  <table class="table table-striped table-hover ">
    <tbody>
          @if (!empty($curso))
            <tr height= 10>
              <td width=100>
                <h5><b>Nombre:</b></h5>
              </td>
              <td>{{$asignatura->nombre}}</td>
            <tr>
              <td width=250><h5><b>Seccion:</b></h5></td>
              <td>{{$curso->seccion }}</td>
            </tr>
            <tr>
              <td width=250><h5><b>Semestre:</b></h5></td>
              <td>{{$curso->semestre }}</td>
            </tr>
            <tr>
              <td width=250><h5><b>Año:</b></h5></td>
              <td>{{$curso->anio }}</td>
            </tr>
            <tr>
              <td width=100><h5><b>El profesor asignado es:</b></h5></td>
              <td>{{$docente->nombres}}</td>
          </tr>
          @else
          <p>
            No existe información de este curso.
          </p>
          @endif
      </tbody>
  </table>
  <table>
     <td><a href="/cursos" class="btn btn-default btn-sm">Volver</a>
          {!! Html::link(route('cursos.edit', $curso->id), 'Editar', array('class' => 'btn btn-warning btn-sm')) !!}</td>
  </table>
@stop
