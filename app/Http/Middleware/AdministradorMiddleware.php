<?php namespace App\Http\Middleware;

use Closure;


class AdministradorMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$user = \Auth::user();
		$administrador = \App\Rol::whereNombre('Administrador')->first();
		$encargado = \App\Rol::whereNombre('Encargado')->first();
		$estudiante = \App\Rol::whereNombre('Estudiante')->first();
		$docente = \App\Rol::whereNombre('Docente')->first();

		if(!$administrador->usuarios()->find($user->rut))
		{
			
			if($encargado->usuarios()->find($user->rut))
			{
				
				return redirect()->route('encar.index');
			}

			if($estudiante->usuarios()->find($user->rut))
			{
				
				return redirect()->route('alumnos.index');
			}
			
			if($docente->usuarios()->find($user->rut))
			{
				
				return redirect()->route('docen.index');
			}
			
			return redirect()->route('autenti.index');
		}


		return $next($request);
	}

}
