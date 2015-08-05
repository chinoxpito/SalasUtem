<?php namespace App\Http\Controllers;

use App\Http\Requests\StoreAsignaturaRequest;
use App\Http\Requests\UpdateAsignaturasRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Departamento;
use Auth;

class AsignaturasController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$usuario = Auth::user();
		$nombre = $usuario->estudiante->nombres;
		$asignaturas = \App\Asignatura::paginate(5);
		
		return view("asignaturas.index", compact('asignaturas'))->with('nombre',$nombre);
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
		return view('asignaturas.create')->with('departamento',$departamento)->with('nombre',$nombre);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(StoreAsignaturaRequest $request)
	{
		$usuario = Auth::user();
		$nombre = $usuario->estudiante->nombres;
		$asignaturas = new \App\Asignatura;

		$asignaturas->nombre = ucwords($request->input('nombre'));
		$asignaturas->codigo = strtoupper($request->input('codigo'));
		$asignaturas->descripcion = ucfirst($request->input('descripcion'));
		$asignaturas->departamento_id = $request->input('departamento_id');

		$asignaturas->save();
		
		return redirect()->route('asignaturas.index')->with('message', 'Asignaturas Agregado')->with('nombre',$nombre);
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
		$asignaturas = \App\Asignatura::find($id);
		$departamento = \App\Departamento::find($asignaturas->departamento_id);
		return view('asignaturas.show')->with('asignatura',$asignaturas)->with('departamento',$departamento)->with('nombre',$nombre);
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
		return view('asignaturas.edit')->with('asignatura', \App\Asignatura::find($id))->with('departamentos',$departamento)->with('nombre',$nombre);
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
		$asignaturas = \App\Asignatura::find($id);

		$asignaturas->nombre = \Request::input('nombre');
		$asignaturas->codigo = \Request::input('codigo');
		$asignaturas->descripcion = \Request::input('descripcion');
		$asignaturas->departamento_id = \Request::input('departamento_id');

		$asignaturas->save();
		return redirect()->route('asignaturas.index', ['asignatura' => $id])->with('message', 'Cambios guardados')->with('nombre',$nombre);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$asignaturas = \App\Asignatura::find($id);

		$asignaturas->delete();

		return redirect()->route('asignaturas.index')->with('message', 'asignaturas Eliminado con éxito');
	
	}

}
