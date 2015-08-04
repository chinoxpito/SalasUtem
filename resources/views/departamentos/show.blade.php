@extends('departamentos.plantilla')
@section('contenido')
<p>
  
  <table>
    <td width=505><h2>Registro de Departamentos</h2></td>
  </table>
</p>
<h4>Información del Departamento "{{$departamento->nombre}}" </h4>
  <table class="table table-striped table-hover ">
    <tbody>
          @if (!empty($departamento))
            <tr height= 10>
              <td width=100>
                <h5><b>Nombre:</b></h5>
              </td>
              <td>{{$departamento->nombre}}</td>
            <tr>
              <td width=250><h5><b>Pertenece a la facultad:</b></h5></td>
              <td>{{$departamento->facultad->nombre}}</td>
            </tr>
            <tr>
              <td width=100><h5><b>Descripcion:</b></h5></td>
              <td>{{$departamento->descripcion}}</td>
          </tr>
          @else
          <p>
            No existe información de este Campus.
          </p>
          @endif
      </tbody>
  </table>
  <table>
    <td><a href="/departamentos" class="btn btn-default btn-sm">Volver</a>
    <td><a href="/departamentos/create" class="btn btn-warning btn-sm">Agregar Departamento</a></td>
  </table>
@stop