@extends('carreras.plantilla')
@section('contenido')
<p>
	
	<table>
	   <td width=505><h2>Registro de Carreras</h2></td>
  </table>
</p>
<h4>Información de la carrera "{{$carrera->nombre}}" </h4>
  <table class="table table-striped table-hover ">
    <tbody>
          @if (!empty($carrera))
            <tr height= 10>
              <td width=100>
                <h5><b>Nombre:</b></h5>
              </td>carrera
              <td>{{$carrera->nombre}}</td>
            <tr>
              <td width=250><h5><b>Pertenece a la escuela:</b></h5></td>
              <td>{{$escuela->nombre }}</td>
            </tr>
            <tr>
              <td width=100><h5><b>Descripcion:</b></h5></td>
              <td>{{$carrera->descripcion}}</td>
          </tr>
					<tr>
						<td width=100><h5><b>Codigo carrera:</b></h5></td>
						<td>{{$carrera->codigo }}</td>
					</tr>
          @else
          <p>
            No existe información de esta Carrera.
          </p>
          @endif
      </tbody>
  </table>
  <table>
     <td><a href="/carreras" class="btn btn-default btn-sm">Volver</a>
          {!! Html::link(route('carreras.edit', $carrera->id), 'Editar', array('class' => 'btn btn-warning btn-sm')) !!}</td>
  </table>
@stop
