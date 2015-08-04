<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Campus;
use Illuminate\Http\Request;

class CampusController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//$campus = Campus::all(); // Cambiar esto, si la db es muy grande queda la escoba
		return view('campus.index')->with('campus', \App\Campus::paginate(5)->setPath('campu'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('campus.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$campus = new \App\Campus;

		$campus->nombre = \Request::input('nombre');
		$campus->direccion = \Request::input('direccion');
		$campus->latitud = \Request::input('latitud');
		$campus->longitud = \Request::input('longitud');
		$campus->descripcion = \Request::input('descripcion');
		$campus->rut_encargado = \Request::input('rut');

		$campus->save();

		return redirect()->route('campus.index')->with('message', 'Campus Agregado');
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$campus = \App\Campus::find($id);
		if($campus)
			return view('campus.show')->with('campu', $campus);
		else
			abort(404);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return view('campus.edit')->with('campu', \App\Campus::find($id));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$campus = \App\Campus::find($id);

		$campus->nombre = \Request::input('nombre');
		$campus->direccion = \Request::input('direccion');
		$campus->latitud = \Request::input('latitud');
		$campus->longitud = \Request::input('longitud');
		$campus->descripcion = \Request::input('descripcion');
		$campus->rut_encargado = \Request::input('rut_encargado');

		$campus->save();
		return redirect()->route('campus.index', ['campu' => $id])->with('message', 'Cambios guardados');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$campus = \App\Campus::find($id);

		$campus->delete();

		return redirect()->route('campus.index')->with('message', 'Campus Eliminado con éxito');
	}

}
