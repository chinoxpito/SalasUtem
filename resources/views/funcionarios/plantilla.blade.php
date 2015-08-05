<!doctype html>
<html lang="en">
<head>
  <title>Administrador</title>
  
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
<table align="right" ><td>Bienvenido/a {{$nombre}}.</td></table>
<body>
  <h1>ADMINISTRADOR</h1>
  <ul class="nav nav-tabs">
      <li class=""><a aria-expanded="false" href="/admi">Inicio</a></li>
      <li class=""><a aria-expanded="true" href="/campus">Campus</a></li>
      <li class=""><a aria-expanded="false" href="/facultades">Facultades</a></li>
      <li class=""><a aria-expanded="false" href="/departamentos">Departamentos</a></li>
      <li class=""><a aria-expanded="false" href="/escuelas">Escuelas</a></li>
      <li class=""><a aria-expanded="false" href="/carreras">Carreras</a></li>
      <li class="active"><a aria-expanded="false" href="/funcionarios">Funcionarios</a></li>
      <li class=""><a aria-expanded="false" href="/docentes">Docentes</a></li>
      <li class=""><a aria-expanded="false" href="/estudiantes">Estudiantes</a></li>
      
      <li class="dropdown">
        
          <a class="dropdown-toggle" data-toggle="dropdown" href="/roles">Roles<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/roles">Roles</a></li>
            <li><a href="/rolesusuarios">Roles de usuarios</a></li>
          </ul>
      </li>

      <li class=""><a aria-expanded="false" href="{{ action('Auth\AuthController@getLogout')}}" >Cerrar</a></li>
  </ul>
  @yield('contenido')
</body>
</html>