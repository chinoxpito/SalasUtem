<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;

class EscuelasController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$usuario = Auth::user();
		$nombre = $usuario->estudiante->nombres;
		$escuelas = \App\Escuela::paginate(5);
		
		return view("escuelas.index", compact('escuelas'))->with('nombre',$nombre);

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
		$departamento = \App\Departamento::lists('nombre','id');
		return view('escuelas.create')->with('departamento',$departamento)->with('nombre',$nombre);
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
		$escuelas = new \App\Escuela;

		$escuelas->nombre = \Request::input('nombre');
		$escuelas->departamento_id = \Request::input('departamento_id');
		$escuelas->descripcion = \Request::input('descripcion');

		$escuelas->save();

		return redirect()->route('escuelas.index')->with('message', 'Escuela Agregada')->with('nombre',$nombre);
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
		$escuela = \App\Escuela::find($id);
		$departamento = \App\Departamento::find($escuela->departamento_id);
		return view('escuelas.show')->with('escuela',$escuela)->with('departamento',$departamento)->with('nombre',$nombre);
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
		$departamento = \App\Departamento::lists('nombre','id');
		return view('escuelas.edit')->with('escuela', \App\Escuela::find($id))->with('departamentos',$departamento)->with('nombre',$nombre);
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
		$escuelas = \App\Escuela::find($id);

		$escuelas->nombre = \Request::input('nombre');
		$escuelas->departamento_id = \Request::input('departamento_id');
		$escuelas->descripcion = \Request::input('descripcion');

		$escuelas->save();
		return redirect()->route('escuelas.index', ['escuela' => $id])->with('message', 'Cambios guardados')->with('nombre',$nombre);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$escuela = \App\Escuela::find($id);

		$escuela->delete();

		return redirect()->route('escuelas.index')->with('message', 'Escuela Eliminada con éxito');
	}

}

