<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class Tipos_SalasController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view("tipos_salas.index")->with('tipos_salas', \App\Tipo_Sala::paginate(5)->setPath('tipo_sala'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('tipos_salas.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$tipos_salas = new \App\Tipo_Sala;

		$tipos_salas->nombre = \Request::input('nombre');
		$tipos_salas->descripcion = \Request::input('descripcion');

		$tipos_salas->save();

		return redirect()->route('tipos_salas.index')->with('message', 'Tipo de Sala Agregado');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$tipos_salas = \App\Tipo_Sala::find($id);

		return view('tipos_salas.show')->with('tipo_sala',$tipos_salas);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return view('tipos_salas.edit')->with('tipo_sala', \App\Tipo_Sala::find($id));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$tipos_salas = \App\Tipo_Sala::find($id);

		$tipos_salas->nombre = \Request::input('nombre');
		$tipos_salas->descripcion = \Request::input('descripcion');

		$tipos_salas->save();
		return redirect()->route('tipos_salas.index', ['tipo_sala' => $id])->with('message', 'Cambios guardados');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$tipos_salas = \App\Tipo_Sala::find($id);

		$tipos_salas->delete();

		return redirect()->route('tipos_salas.index')->with('message', 'Tipo de sala Eliminada');
	}

}
