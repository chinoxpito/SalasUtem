<!doctype html>
<html lang="en">
<head>
  <title>Estudiante</title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('/css/yeti.css') }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  <meta charset="UTF-8">
  <title>Administrador|Menu</title>
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
      <li class="active"><a aria-expanded="false" href="/estudi">Inicio</a></li>
      <li class=""><a aria-expanded="true" href="/horarios">Horario</a></li>
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