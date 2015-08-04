@extends('alumno.plantilla')
@section('contenido')

      <section id="main-content">
        <section class="wrapper">
                        <div class="row mtbox">
                        <!--  @if ( !Auth::guest() )
                        <center><h1>Bienvenido {{Auth::user("")->nombres}}</h1></center>
                        @endif-->
                        <center><h1>Bienvenido {{$nombreCompleto}}</h1></center>

                        <center><h3>Tus clases para esta semana son las siguientes.</h3></center>

                        </div>

                        <div class="row">
                      <div class="col-md-12">
                          <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                              <h3>Lunes {{$semana[0]}}</h3>
                          </div>
                            <hr>
                              <thead>
                              <tr>
                                  <th> Periodo</th>
                                  <th> Hora Inicio</th>
                                  <th> Curso</th>
                                  <th> Profesor</th>
                                  <th> Sala</th>
                              </tr>
                              </thead>

                              <tbody>
                            @foreach($cursos as $curso)
                            @foreach($curso->horarios as $horario)
                            @if($horario->fecha == $semana[0])
                              <tr>
                                  <td>{{ $horario->periodo->bloque}}</td>
                                  <td>{{ $horario->periodo->inicio}}</td>     
                                  <td>{{ $horario->curso->asignatura->nombre }} (Sección {{$horario->curso->seccion}})</td>
                                  
                                  <td>{{ $horario->sala->nombre}}</td>
                              </tr>
                            @endif
                            @endforeach
                            @endforeach
                              </tbody>
                          </table>
                          </div>
                          </div>
                        </div><!-- /row -->

                        <div class="row mt">
                      <div class="col-md-12">
                          <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                              <h3>Martes {{$semana[1]}}</h3>
                          </div>
                            <hr>
                              <thead>
                              <tr>
                                  <th> Periodo</th>
                                  <th> Hora Inicio</th>
                                  <th> Curso</th>
                                  <th> Profesor</th>
                                  <th> Sala</th>
                              </tr>
                              </thead>

                              <tbody>
                            @foreach($cursos as $curso)
                            @foreach($curso->horarios as $horario)
                            @if($horario->fecha == $semana[1])
                              <tr>
                                  <td>{{ $horario->periodo->bloque}}</td>
                                  <td>{{ $horario->periodo->inicio}}</td>     
                                  <td>{{ $horario->curso->asignatura->nombre }} (Sección {{$horario->curso->seccion}})</td>
                                  
                                  <td>{{ $horario->sala->nombre}}</td>
                              </tr>
                            @endif
                            @endforeach
                            @endforeach
                              </tbody>
                          </table>
                          </div>
                          </div>
                        </div><!-- /row -->

                        <div class="row mt">
                          <div class="col-md-12">
                          <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                              <h3>Miércoles {{$semana[2]}}</h3>
                          </div>
                            <hr>
                              <thead>
                              <tr>
                                  <th> Periodo</th>
                                  <th> Hora Inicio</th>
                                  <th> Curso</th>
                                  <th> Profesor</th>
                                  <th> Sala</th>
                              </tr>
                              </thead>

                              <tbody>
                            @foreach($cursos as $curso)
                            @foreach($curso->horarios as $horario)
                            @if($horario->fecha == $semana[2])
                              <tr>
                                  <td>{{ $horario->periodo->bloque}}</td>
                                  <td>{{ $horario->periodo->inicio}}</td>     
                                  <td>{{ $horario->curso->asignatura->nombre }} (Sección {{$horario->curso->seccion}})</td>
                                  
                                  <td>{{ $horario->sala->nombre}}</td>
                              </tr>
                            @endif
                            @endforeach
                            @endforeach
                              </tbody>
                          </table>
                          </div>
                          </div>
                        </div><!-- /row -->

                        <div class="row mt">
                       <div class="col-md-12">
                          <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                              <h3>Jueves {{$semana[3]}}</h3>
                          </div>
                            <hr>
                              <thead>
                              <tr>
                                  <th> Periodo</th>
                                  <th> Hora Inicio</th>
                                  <th> Curso</th>
                                  <th> Profesor</th>
                                  <th> Sala</th>
                              </tr>
                              </thead>

                              <tbody>
                            @foreach($cursos as $curso)
                            @foreach($curso->horarios as $horario)
                            @if($horario->fecha == $semana[3])
                              <tr>
                                  <td>{{ $horario->periodo->bloque}}</td>
                                  <td>{{ $horario->periodo->inicio}}</td>     
                                  <td>{{ $horario->curso->asignatura->nombre }} (Sección {{$horario->curso->seccion}})</td>
                                 
                                  <td>{{ $horario->sala->nombre}}</td>
                              </tr>
                            @endif
                            @endforeach
                            @endforeach
                              </tbody>
                          </table>
                          </div>
                          </div>
                        </div><!-- /row -->

                        <div class="row mt">
                      <div class="col-md-12">
                          <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                              <h3>Viernes {{$semana[4]}}</h3>
                          </div>
                            <hr>
                              <thead>
                              <tr>
                                  <th> Periodo</th>
                                  <th> Hora Inicio</th>
                                  <th> Curso</th>
                                  <th> Profesor</th>
                                  <th> Sala</th>
                              </tr>
                              </thead>

                              <tbody>
                            @foreach($cursos as $curso)
                            @foreach($curso->horarios as $horario)
                            @if($horario->fecha == $semana[4])
                              <tr>
                                  <td>{{ $horario->periodo->bloque}}</td>
                                  <td>{{ $horario->periodo->inicio}}</td>     
                                  <td>{{ $horario->curso->asignatura->nombre }} (Sección {{$horario->curso->seccion}})</td>
                                  
                                  <td>{{ $horario->sala->nombre}}</td>
                              </tr>
                            @endif
                            @endforeach
                            @endforeach
                              </tbody>
                          </table>
                          </div>
                          </div>
                        </div><!-- /row -->
        </section>
      </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ asset('/js/jquery.js') }}"></script>
    <script src="{{ asset('/js/jquery-1.8.3.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
    <script class="include" type="text/javascript" src="{{ asset('/js/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{ asset('/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/jquery.sparkline.js') }}"></script>


    <!--common script for all pages-->
    <script src="{{ asset('/js/common-scripts.js"></script>




    <!--script for this page-->
@endsection