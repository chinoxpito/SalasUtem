<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class DepartamentosController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view("departamentos.index")->with('departamentos', \App\Departamento::paginate(5)->setPath('departamento'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$facultad = \App\Facultad::lists('nombre','id');
		return view('departamentos.create')->with('facultad',$facultad);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
		$departamentos = new \App\Departamento;

		$departamentos->nombre = \Request::input('nombre');
		$departamentos->facultad_id = \Request::input('facultad_id');
		$departamentos->descripcion = \Request::input('descripcion');

		$departamentos->save();

		return redirect()->route('departamentos.index')->with('message', 'Departamento Agregado');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		
		$departamento = \App\Departamento::find($id);
		$facultades = \App\Facultad::find($id);
		return view('departamentos.show')->with('departamento',$departamento)->with('facultad',$facultades);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$facultad = \App\Facultad::lists('nombre','id');
		return view('departamentos.edit')->with('departamento', \App\Departamento::find($id))->with('facultades',$facultad);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		
		$departamentos = \App\Departamento::find($id);

		$departamentos->nombre = \Request::input('nombre');
		$departamentos->facultad_id = \Request::input('facultad_id');
		$departamentos->descripcion = \Request::input('descripcion');

		$departamentos->save();
		return redirect()->route('departamentos.index', ['departamento' => $id])->with('message', 'Cambios guardados');
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
