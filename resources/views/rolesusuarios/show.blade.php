@extends('rolesusuarios.plantilla')
@section('contenido')
<p>
  
	<table>
	   <td width=505><h2>rolusuario elegido: "{{$rolusuario->rut}}"</h2></td>
  </table>
</p>

  <table class="table table-striped table-hover ">
    <tbody>
          @if (!empty($rolusuario))
            <tr height= 10>
              <td width=100>
                <h5><b>rut:</b></h5>
              </td>
              <td>{{$rolusuario->rut}}</td>
            <tr>
              <td width=250><h5><b>Descripcion:</b></h5></td>
              <td>{{$rol->nombre }}</td>
            </tr>
          @else
          <p>
            No existe información de este rolusuario.
          </p>
          @endif
      </tbody>
  </table>
  <table>
     <td><a href="/rolesusuarios" class="btn btn-default btn-sm">Volver</a>
          {!! Html::link(route('rolesusuarios.edit', $rolusuario->id), 'Editar', array('class' => 'btn btn-warning btn-sm')) !!}</td>
  </table>
@stop
