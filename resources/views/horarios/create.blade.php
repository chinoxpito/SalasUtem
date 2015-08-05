@extends('horarios.plantilla')
@section('contenido')
  <section id="main-content">
          <section class="wrapper">
          <br>
            <h3> Registrar Horario</h3>

            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
              <div class="col-lg-12">
                  <div class="form-panel">
                    @if (count($errors) > 0)
	                    <div class="alert alert-danger">
	                      <ul>
	                        @foreach ($errors->all() as $error)
	                           <li>{{ $error }}</li>
                          @endforeach
	                      </ul>
                      </div>
                    @endif
                      <h4 class="mb">Ingrese la información del horario</h4>
                      {!! Form::open(['route' => 'horarios.store']) !!}
                      <form class="form-horizontal style-form" method="get">
                      		<div class="form-group">Fecha inicial del semestre
								            {!! Form::text('fechaInicial', null, ['id' => 'fecha1', 'class' => 'form-control', 'placeholder'=>'Dia de Inicio DD-MM-AA']) !!}
							            <script>
                            $(function() {
                              $("#datepicker").datepicker();
                            });
                          </script>
                          </div>
							            <div class="form-group"><p>Sala:
								            {!! Form::select('salas_id', $salas) !!}</p>
							            </div>
							            <div class="form-group"><p>Período:
							            	{!! Form::select('periodo_id', $periodo) !!}</p>
							            </div>
							            <div class="form-group"><p>Curso:
								            {!! Form::select('curso_id', $curso) !!}</p>
							            </div>
                          <div class="form-group">Fecha final del semestre
								            {!! Form::text('fechaFinal', null, ['id' => 'fecha2', 'class' => 'form-control', 'placeholder'=>'Dia de termino DD-MM-AA']) !!}
                            <script>
                              $(function() {
                                $("#datepicker2").datepicker();
                              });
                            </script>
							            </div>
							            <div class="form-group">
								            {!! Form::submit('Registrar', ["class" => "btn btn-success btn-block"]) !!}
							            </div>

					          </form>
							      {!! Form::close() !!}
      						  <p>
	    						    @if(Session::has('message'))
          						  <div class="btn btn-success disabled{{ Session::get('class') }}">{{ Session::get('message')}}</div>
        						  @endif
      						</p>
                  </div>
              </div>
            </div>

<center>
<br>
</center>
    </section>
      </section>
      <td><a href="/horarios" class="btn btn-default btn-sm">Volver</a>

@endsection