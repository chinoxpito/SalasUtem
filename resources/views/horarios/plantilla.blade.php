<!doctype html>
<html lang="en">
<head>
  <title>Estudiante</title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('/css/yeti.css') }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  <meta charset="utf-8">
  <title>jQuery UI Datepicker - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  

  <meta charset="UTF-8">
  <title>Estudiante</title>
  <link href="{{ asset('/css/yeti.css') }}" rel="stylesheet">
  <style>
  body {
    width: 960px;
    margin: 50px auto;
  }
  .badge {
    float: right;
  }
</style>
</head>
<body>
  <h1>ESTUDIANTE</h1>
  <ul class="nav nav-tabs">
      <li class=""><a aria-expanded="false" href="/estudi">Inicio</a></li>
      <li class="active"><a aria-expanded="true" href="/horarios">Horario</a></li>
      <li class=""><a aria-expanded="false" href="/cursos">Cursos</a></li>
      <li class=""><a aria-expanded="false" href="/periodos">Periodos</a></li>
      
      <li class="dropdown">
        
          <a class="dropdown-toggle" data-toggle="dropdown" href="/roles">Salas<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/salas">Salas</a></li>
            <li><a href="/tipos_salas">Tipos de salas</a></li>
          </ul>
      </li>

      <li class=""><a aria-expanded="false" href="{{ action('Auth\AuthController@getLogout')}}" >Cerrar</a></li>
  </ul>
  @yield('contenido')
</body>
</html>