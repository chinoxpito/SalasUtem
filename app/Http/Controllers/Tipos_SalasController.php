<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;

class Tipos_SalasController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$usuario = Auth::user();
		$nombre = $usuario->estudiante->nombres;
		$tipos_salas = \App\Tipo_Sala::paginate(5);
		
		return view("tipos_salas.index", compact('tipos_salas'))->with('nombre',$nombre);
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
		return view('tipos_salas.create')->with('nombre',$nombre);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$usuario = Auth::user();
		$nombre = $usuario->estudiante->nombres;
		$tipos_salas = new \App\Tipo_Sala;

		$tipos_salas->nombre = \Request::input('nombre');
		$tipos_salas->descripcion = \Request::input('descripcion');

		$tipos_salas->save();

		return redirect()->route('tipos_salas.index')->with('message', 'Tipo de Sala Agregado')->with('nombre',$nombre);
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
		$tipos_salas = \App\Tipo_Sala::find($id);

		return view('tipos_salas.show')->with('tipo_sala',$tipos_salas)->with('nombre',$nombre);
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
		return view('tipos_salas.edit')->with('tipo_sala', \App\Tipo_Sala::find($id))->with('nombre',$nombre);
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
		$tipos_salas = \App\Tipo_Sala::find($id);

		$tipos_salas->nombre = \Request::input('nombre');
		$tipos_salas->descripcion = \Request::input('descripcion');

		$tipos_salas->save();
		return redirect()->route('tipos_salas.index', ['tipo_sala' => $id])->with('message', 'Cambios guardados')->with('nombre',$nombre);
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
