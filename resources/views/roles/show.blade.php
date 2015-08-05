@extends('roles.plantilla')
@section('contenido')
<p>
  
	<table>
	   <td width=505><h2>Rol elegido: "{{$rol->nombre}}"</h2></td>
  </table>
</p>

  <table class="table table-striped table-hover ">
    <tbody>
          @if (!empty($rol))
            <tr height= 10>
              <td width=100>
                <h5><b>Nombre:</b></h5>
              </td>
              <td>{{$rol->nombre}}</td>
            <tr>
              <td width=250><h5><b>Descripcion:</b></h5></td>
              <td>{{$rol->descripcion }}</td>
            </tr>
          @else
          <p>
            No existe información de este rol.
          </p>
          @endif
      </tbody>
  </table>
  <table>
     <td><a href="/roles" class="btn btn-default btn-sm">Volver</a>
          
  </table>
@stop
