<?php namespace App\Http\Middleware;

use Closure;


class AlumnoMiddleware {

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
		$alumno = \App\Rol::whereNombre('Estudiante')->first();

		if(!$alumno->usuarios()->find($user->rut))
		{
			return redirect()->route('autenti.index');
		}


		return $next($request);
	}

}