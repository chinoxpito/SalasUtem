@extends('docentes.plantilla')
@section('contenido')
<p>
	
	<table>
		<td width=505><h2>Registro de Docentes</h2></td>
		
	</table>
</p>
<h4>Información del Docente "{{$docente->nombre}}" </h4>
  <table class="table table-striped table-hover ">
    <tbody>
          @if (!empty($docente))
            <tr height= 10>
              <td width=100>
                <h5><b>Departamento:</b></h5>
              </td>
              <td>{{$departamento->nombre}}</td>
            <tr>
              <td width=100><h5><b>RUT:</b></h5></td>
              <td>{{$docente->rut}}</td>
            </tr>
            <tr>
              <td width=100><h5><b>Nombres:</b></h5></td>
              <td>{{$docente->nombres}}</td>
            </tr>
            <tr>
              <td width=100><h5><b>Apellidos:</b></h5></td>
              <td>{{$docente->apellidos}}</td>
            </tr>
          @else
          <p>
            No existe información de este Docente.
          </p>
          @endif
      </tbody>
</table>
<table>
<td><a href="/docentes" class="btn btn-default btn-sm">Volver</a>
    {!! Html::link(route('docentes.edit', $docente->id), 'Editar', array('class' => 'btn btn-warning btn-sm')) !!}</td>
</table>
  @stop
