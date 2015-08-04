@extends('campus.plantilla')
@section('contenido')
<p>
	
	<table>
	   <td width=505><h2>Registro de Campus</h2></td>
	    
  </table>
</p>
<h4>Información del campus "{{$campu->nombre}}" </h4>
  <table class="table table-striped table-hover ">
    <tbody>
          @if (!empty($campu))
            <tr height= 10>
              <td width=100>
                <h5><b>Nombre:</b></h5>
              </td>
              <td>{{$campu->nombre}}</td>
            <tr>
              <td width=100><h5><b>Direccion:</b></h5></td>
              <td>{{$campu->direccion }}</td>
            </tr>
            <tr>
              <td width=100><h5><b>Latitud:</b></h5></td>
              <td>{{$campu->latitud}}</td>
            </tr>
            <tr>
              <td width=100><h5><b>Longitud:</b></h5></td>
              <td>{{$campu->longitud}}</td>
            </tr>
            <tr>
              <td width=100><h5><b>Descripcion:</b></h5></td>
              <td>{{$campu->descripcion}}</td>
          </tr>
          <tr>
            <td width=100><h5><b>Encargado:</b></h5></td>
          <td>{{$campu->rut_encargado}}</td>
          </tr>
          @else
          <p>
            No existe información de este Campus.
          </p>
          @endif
      </tbody>
  </table>
  <table>
     <td><a href="/campus" class="btn btn-default btn-sm">Volver</a>
          {!! Html::link(route('campus.edit', $campu->id), 'Editar', array('class' => 'btn btn-warning btn-sm')) !!}</td>
  </table>
@stop
