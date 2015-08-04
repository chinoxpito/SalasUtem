<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CarrerasController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view("carreras.index")->with('carreras', \App\Carrera::paginate(5)->setPath('carrera'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$escuela = \App\Escuela::lists('nombre','id');
		return view('carreras.create')->with('escuela',$escuela);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$carreras = new \App\Carrera;

		$carreras->codigo = \Request::input('codigo');
		$carreras->nombre = \Request::input('nombre');
		$carreras->descripcion = \Request::input('descripcion');
		$carreras->escuela_id = \Request::input('escuela_id');
		$carreras->save();

		return redirect()->route('carreras.index')->with('message', 'Carrera Agregada');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$carreras = \App\Carrera::find($id);
		$escuela = \App\Escuela::find($carreras->escuela_id);
		return view('carreras.show')->with('carrera',$carreras)->with('escuela',$escuela);

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$escuela = \App\Escuela::lists('nombre','id');
		return view('carreras.edit')->with('carrera', \App\Carrera::find($id))->with('escuelas',$escuela);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$carreras = \App\Carrera::find($id);

		$carreras->codigo = \Request::input('codigo');
		$carreras->nombre = \Request::input('nombre');
		$carreras->descripcion = \Request::input('descripcion');
		$carreras->escuela_id = \Request::input('escuela_id');

		$carreras->save();
		return redirect()->route('carreras.index', ['carrera' => $id])->with('message', 'Cambios guardados');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$carrera = \App\Carrera::find($id);

		$carrera->delete();

		return redirect()->route('carreras.index')->with('message', 'Carrera Eliminada con éxito');
	}

}
