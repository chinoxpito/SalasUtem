<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;

class DepartamentosController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		$usuario = Auth::user();
		$nombre = $usuario->estudiante->nombres;
		$departamentos = \App\Departamento::paginate(5);
		
		return view("departamentos.index", compact('departamentos'))->with('nombre',$nombre);
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
		$facultad = \App\Facultad::lists('nombre','id');
		return view('departamentos.create')->with('facultad',$facultad)->with('nombre',$nombre);
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
		$departamentos = new \App\Departamento;

		$departamentos->nombre = \Request::input('nombre');
		$departamentos->facultad_id = \Request::input('facultad_id');
		$departamentos->descripcion = \Request::input('descripcion');

		$departamentos->save();

		return redirect()->route('departamentos.index')->with('message', 'Departamento Agregado')->with('nombre',$nombre);
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
		$departamento = \App\Departamento::find($id);
		$facultades = \App\Facultad::find($id);
		return view('departamentos.show')->with('departamento',$departamento)->with('facultad',$facultades)->with('nombre',$nombre);
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
		$facultad = \App\Facultad::lists('nombre','id');
		return view('departamentos.edit')->with('departamento', \App\Departamento::find($id))->with('facultades',$facultad)->with('nombre',$nombre);
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
		$departamentos = \App\Departamento::find($id);

		$departamentos->nombre = \Request::input('nombre');
		$departamentos->facultad_id = \Request::input('facultad_id');
		$departamentos->descripcion = \Request::input('descripcion');

		$departamentos->save();
		return redirect()->route('departamentos.index', ['departamento' => $id])->with('message', 'Cambios guardados')->with('nombre',$nombre);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$departamento = \App\Departamento::find($id);

		$departamento->delete();

		return redirect()->route('departamentos.index')->with('message', 'Departamento Eliminado con éxito');
	}

}
