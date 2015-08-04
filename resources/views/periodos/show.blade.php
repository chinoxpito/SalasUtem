@extends('periodos.plantilla')
@section('contenido')
<p>
  
	<table>
	   <td width=505><h2>Periodo elegido: "{{$periodo->bloque}}"</h2></td>
  </table>
</p>

  <table class="table table-striped table-hover ">
    <tbody>
          @if (!empty($periodo))
            <tr height= 10>
              <td width=100>
                <h5><b>Bloque:</b></h5>
              </td>
              <td>{{$periodo->bloque}}</td>
            <tr>
              <td width=250><h5><b>Comienza a las:</b></h5></td>
              <td>{{$periodo->inicio }}</td>
            </tr>
            <tr>
              <td width=100><h5><b>Termina a las:</b></h5></td>
              <td>{{$periodo->fin}}</td>
          </tr>
          @else
          <p>
            No existe información de este periodo.
          </p>
          @endif
      </tbody>
  </table>
  <table>
     <td><a href="/periodos" class="btn btn-default btn-sm">Volver</a>
          {!! Html::link(route('periodos.edit', $periodo->id), 'Editar', array('class' => 'btn btn-warning btn-sm')) !!}</td>
  </table>
@stop
