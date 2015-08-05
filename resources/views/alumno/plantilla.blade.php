<!doctype html>
<html lang="en">
<head>
  <title>Estudiante</title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('/css/yeti.css') }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

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
<table align="right" ><td>Bienvenido/a.</td></table>
<body>
  <h1>ESTUDIANTE</h1>
  <ul class="nav nav-tabs">
      <li class=""><a aria-expanded="false" href="/estudi">Inicio</a></li>
      <li class="active"><a aria-expanded="false" href="/alumno">Horario</a></li>

      <li class=""><a aria-expanded="false" href="{{ action('Auth\AuthController@getLogout')}}" >Cerrar</a></li>
  </ul>
  @yield('contenido')
</body>
</html>