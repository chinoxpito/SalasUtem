<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class EstudiantesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view("estudiantes.index")->with('estudiantes', \App\Estudiante::paginate(5)->setPath('estudiante'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$carrera = \App\Carrera::lists('nombre','id');
		return view('estudiantes.create')->with('carrera',$carrera);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$estudiantes = new \App\Estudiante;

		$estudiantes->carrera_id = \Request::input('carrera_id');
		$estudiantes->rut = \Request::input('rut');
		$estudiantes->nombres = \Request::input('nombres');
		$estudiantes->apellidos = \Request::input('apellidos');
		$estudiantes->email = \Request::input('email');

		$estudiantes->save();

		return redirect()->route('estudiantes.index')->with('message', 'Estudiante Agregado');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$estudiante = \App\Estudiante::find($id);
		$carrera = \App\Carrera::find($estudiante->carrera_id);
		return view('estudiantes.show')->with('estudiante',$estudiante)->with('carrera',$carrera);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$carrera = \App\Carrera::lists('nombre','id');
		return view('estudiantes.edit')->with('estudiante', \App\Estudiante::find($id))->with('carrera',$carrera);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$estudiantes = \App\Estudiante::find($id);

		$estudiantes->carrera_id = \Request::input('carrera_id');
		$estudiantes->rut = \Request::input('rut');
		$estudiantes->nombres = \Request::input('nombres');
		$estudiantes->apellidos = \Request::input('apellidos');
		$estudiantes->email = \Request::input('email');

		$estudiantes->save();
		return redirect()->route('estudiantes.index', ['carrera' => $id])->with('message', 'Cambios guardados');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$estudiante = \App\Estudiante::find($id);

		$estudiante->delete();

		return redirect()->route('estudiantes.index')->with('message', 'Estudiante Eliminado con éxito');
	}

}
