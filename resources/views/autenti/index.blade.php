@extends('autenti.plantilla')
  <center>
  <h2> </h2> 
  <img src="http://ccespana.cl/seminario/wp-content/themes/conferencia/images/logos/utem.jpg" width="150" height="200" border="0" >
  
</center>
 <h2> </h2>
 <center>
<div class="divspoiler">
    
    
    <a href="javascript:void(0);" target=_parent  class="btn btn-primary" onclick="if (this.parentNode.nextSibling.childNodes[0].style.display != '') { this.parentNode.nextSibling.childNodes[0].style.display = ''; } else { this.parentNode.nextSibling.childNodes[0].style.display = 'none';}" >Ingresar</a>
    

</div><div><div class="spoiler" style="display: none;">

<table>
    <center>
        
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <h2 class="form-signin-heading">Iniciar sesión</h2>

                <div class="form-group">
                    <input type="text" class="form-control" name="rut" placeholder="Usuario" value="{{ old('rut') }}" required="" autofocus="">
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" required="" autofocus="">
                </div>

                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember"> Recordar
                        </label>
                        <a class="btn btn-link" href="{{ url('/password/email') }}">¿Olvidaste tu contraseña?</a>
                    </div>
                </div>

                <div class="form-group">
                    
                        <button type="submit" class="btn btn-lg btn-primary btn-block">Iniciar</button>
                </div>
        </form>
    
    </center>
</table>

</div></div>
</center>

