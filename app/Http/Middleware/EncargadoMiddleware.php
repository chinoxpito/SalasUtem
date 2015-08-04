<?php namespace App\Http\Middleware;

use Closure;


class EncargadoMiddleware {

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
		$encargado = \App\Rol::whereNombre('Encargado')->first();

		if(!$encargado->usuarios()->find($user->rut))
		{
			return redirect()->route('autenti.index');
		}


		return $next($request);
	}

}