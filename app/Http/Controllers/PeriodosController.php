<?php namespace App\Http\Controllers;

use App\Http\Requests\StorePeriodoRequest;
use App\Http\Requests\UpdatePeriodoRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class PeriodosController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$usuario = Auth::user();
		$nombre = $usuario->estudiante->nombres;
		$periodos = \App\Periodo::paginate(5);
		
		return view("periodos.index", compact('periodos'))->with('nombre',$nombre);
		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$usuario = Auth::user();
		$nombre = $usuario->estudiante->nombres;
		return view('periodos.create')->with('nombre',$nombre);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(StorePeriodoRequest $request)
	{
		$usuario = Auth::user();
		$nombre = $usuario->estudiante->nombres;
		$periodo = new \App\Periodo;

		$periodo->bloque = ucwords($request->input('bloque'));
		$periodo->inicio = $request->input('inicio');
		$periodo->fin = $request->input('fin');
		
		$periodo->save();

		return redirect()->route('periodos.index')->with('message', 'Periodo agregado')->with('nombre',$nombre);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$usuario = Auth::user();
		$nombre = $usuario->estudiante->nombres;
		$periodo = \App\Periodo::find($id);

		return view('periodos.show')->with('periodo',$periodo)->with('nombre',$nombre);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$usuario = Auth::user();
		$nombre = $usuario->estudiante->nombres;
		return view('periodos.edit')->with('periodo', \App\Periodo::find($id))->with('nombre',$nombre);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$usuario = Auth::user();
		$nombre = $usuario->estudiante->nombres;
		$periodo = \App\Periodo::find($id);

		$periodo->bloque = \Request::input('bloque');
		$periodo->inicio = \Request::input('inicio');
		$periodo->fin = \Request::input('fin');

		$periodo->save();
		return redirect()->route('periodos.index', ['periodo' => $id])->with('message', 'Cambios guardados')->with('nombre',$nombre);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$periodo = \App\Periodo::find($id);

		$periodo->delete();

		return redirect()->route('periodos.index')->with('message', 'Periodo eliminado con éxito');
	}

}
