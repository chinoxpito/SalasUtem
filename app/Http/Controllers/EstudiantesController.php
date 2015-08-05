<?php namespace App\Http\Controllers;

use App\Http\Requests\StoreEstudianteRequest;
use App\Http\Requests\UpdateEstudianteRequest;
use App\Http\Controllers\Controller;
use App\Carrera;
use Illuminate\Http\Request;
use Auth;

class EstudiantesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$usuario = Auth::user();
		$nombre = $usuario->estudiante->nombres;
		$estudiantes = \App\Estudiante::paginate(5);
		
		return view("estudiantes.index", compact('estudiantes'))->with('nombre',$nombre);
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
		$carrera = \App\Carrera::lists('nombre','id');
		return view('estudiantes.create')->with('carrera',$carrera)->with('nombre',$nombre);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(StoreEstudianteRequest $request)
	{
		$usuario = Auth::user();
		$nombre = $usuario->estudiante->nombres;
		$estudiante = new \App\Estudiante;

		$estudiante->carrera_id = $request->input('carrera_id');
		$estudiante->rut = $request->input('rut');
		$estudiante->nombres = ucwords($request->input('nombres'));
		$estudiante->apellidos = ucwords($request->input('apellidos'));
		$estudiante->email = $request->input('email');

		$estudiante->save();

		return redirect()->route('estudiantes.index')->with('message', 'Estudiante Agregado')->with('nombre',$nombre);
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
		$estudiante = \App\Estudiante::find($id);
		$carrera = \App\Carrera::find($estudiante->carrera_id);
		return view('estudiantes.show')->with('estudiante',$estudiante)->with('carrera',$carrera)->with('nombre',$nombre);
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
		$carrera = \App\Carrera::lists('nombre','id');
		return view('estudiantes.edit')->with('estudiante', \App\Estudiante::find($id))->with('carrera',$carrera)->with('nombre',$nombre);
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
		$estudiantes = \App\Estudiante::find($id);

		$estudiantes->carrera_id = \Request::input('carrera_id');
		$estudiantes->rut = \Request::input('rut');
		$estudiantes->nombres = \Request::input('nombres');
		$estudiantes->apellidos = \Request::input('apellidos');
		$estudiantes->email = \Request::input('email');

		$estudiantes->save();
		return redirect()->route('estudiantes.index', ['carrera' => $id])->with('message', 'Cambios guardados')->with('nombre',$nombre);
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
