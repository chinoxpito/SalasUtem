@extends('horarios.plantilla')
@section('contenido')
<p>
  <ul class="nav nav-tabs">
    <li class=""><a aria-expanded="true" href="/admin/menu" data-toggle="tab">Principal</a></li>
    <li class="active"><a aria-expanded="false" href="/asignaturas" data-toggle="tab">Asignaturas</a></li>
    <li class=""><a aria-expanded="false" href="/cursos" data-toggle="tab">Cursos</a></li>
    <li class=""><a aria-expanded="false" href="/horarios" data-toggle="tab">Horarios</a></li>
    <li class=""><a aria-expanded="false" href="/periodos" data-toggle="tab">Periodos</a></li>
    <li class=""><a aria-expanded="false" href="/asignaturascursadas" data-toggle="tab">Asignaturas Cursadas</a></li>
    </ul>
	<table>
	   <td width=505><h2>HORARIO</h2></td>
  </table>
</p>
<h4>Información del horario "{{$horario->fecha}}" </h4>
  <table class="table table-striped table-hover ">
    <tbody>
          @if (!empty($horario))
            <tr height= 10>
              <td width=100>
                <h5><b>Fecha:</b></h5>
              </td>
              <td>{{$horario->fecha}}</td>
            <tr>
              <td width=250><h5><b>Curso:</b></h5></td>
              <td>{{$horario->curso_id }}</td>
            </tr>
            <tr>
              <td width=100><h5><b>Sala:</b></h5></td>
              <td>{{$horario->sala_id}}</td>
          </tr>
          <tr>
              <td width=250><h5><b>Periodo:</b></h5></td>
              <td>{{$horario->periodo_id }}</td>
            </tr>
          @else
          <p>
            No existe información para esta fecha.
          </p>
          @endif
      </tbody>
  </table>
  <table>
     <td><a href="/horarios" class="btn btn-default btn-sm">Volver</a>
          {!! Html::link(route('horarios.edit', $horario->id), 'Editar', array('class' => 'btn btn-warning btn-sm')) !!}</td>
  </table>
@stop
