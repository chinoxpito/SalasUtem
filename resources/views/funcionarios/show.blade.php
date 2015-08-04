@extends('funcionarios.plantilla')
@section('contenido')
<p>
	
	<table>
		<td width=505><h2>Registro de Funcionarios</h2></td>
		
	</table>
</p>
<h4>Información del Funcionario "{{$funcionario->nombres}}" </h4>
  <table class="table table-striped table-hover ">
    <tbody>
          @if (!empty($funcionario))
            <tr height= 10>
              <td width=100>
                <h5><b>Departamento:</b></h5>
              </td>
              <td>{{$departamento->nombre}}</td>
            <tr>
              <td width=100><h5><b>RUT:</b></h5></td>
              <td>{{$funcionario->rut}}</td>
            </tr>
            <tr>
              <td width=100><h5><b>Nombres:</b></h5></td>
              <td>{{$funcionario->nombres}}</td>
            </tr>
            <tr>
              <td width=100><h5><b>Apellidos:</b></h5></td>
              <td>{{$funcionario->apellidos}}</td>
            </tr>
          @else
          <p>
            No existe información de este Funcionario.
          </p>
          @endif
      </tbody>
  </table>
  <table>
    
    <td><a href="/funcionarios" class="btn btn-default btn-sm">Volver</a>
    {!! Html::link(route('funcionarios.edit', $funcionario->id), 'Editar', array('class' => 'btn btn-warning btn-sm')) !!}</td>
  </table>
@stop
