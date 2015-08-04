<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;

class PeriodosController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$periodos = \App\Periodo::paginate(5);
		return view("periodos.index", compact('periodos'));
		//return view("periodos.index", compact('periodos'))->with('periodos', \App\Periodo::paginate(5)->setPath('periodo'));
		dd($periodos);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('periodos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$periodo = new \App\Periodo;

		$periodo->bloque = \Request::input('bloque');
		$periodo->inicio = \Request::input('inicio');
		$periodo->fin = \Request::input('fin');
		
		$periodo->save();

		return redirect()->route('periodos.index')->with('message', 'Periodo agregado');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$periodo = \App\Periodo::find($id);

		return view('periodos.show')->with('periodo',$periodo);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return view('periodos.edit')->with('periodo', \App\Periodo::find($id));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$periodo = \App\Periodo::find($id);

		$periodo->bloque = \Request::input('bloque');
		$periodo->inicio = \Request::input('inicio');
		$periodo->fin = \Request::input('fin');

		$periodo->save();
		return redirect()->route('periodos.index', ['periodo' => $id])->with('message', 'Cambios guardados');
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
