<?php namespace App\Http\Controllers;

use App\Http\Requests\StoreDocenteRequest;
use App\Http\Requests\UpdateDocenteRequest;
use App\Http\Controllers\Controller;
use App\Departamento;
use Illuminate\Http\Request;
use Auth;

class DocentesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$usuario = Auth::user();
		$nombre = $usuario->estudiante->nombres;
		$docentes = \App\Docente::paginate(5);
		
		return view("docentes.index", compact('docentes'))->with('nombre',$nombre);
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
		return view('docentes.create')->with('departamento',$departamento)->with('nombre',$nombre);
		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(StoreDocenteRequest $request)
	{

		$usuario = Auth::user();
		$nombre = $usuario->estudiante->nombres;
		$docentes = new \App\Docente;

		$docentes->departamento_id = $request->input('departamento_id');
		$docentes->rut = $request->input('rut');
		$docentes->nombres = ucwords($request->input('nombres'));
		$docentes->apellidos = ucwords($request->input('apellidos'));

		$docentes->save();

		return redirect()->route('docentes.index')->with('message', 'Docente Agregado')->with('nombre',$nombre);
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
		$docentes = \App\Docente::find($id);
		$departamento = \App\Departamento::find($docentes->departamento_id);
		return view('docentes.show')->with('docente',$docentes)->with('departamento',$departamento)->with('nombre',$nombre);
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
		return view('docentes.edit')->with('docente', \App\Docente::find($id))->with('departamentos',$departamento)->with('nombre',$nombre);
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
		$docentes = \App\Docente::find($id);

		$docentes->departamento_id = \Request::input('departamento_id');
		$docentes->rut = \Request::input('rut');
		$docentes->nombres = \Request::input('nombres');
		$docentes->apellidos = \Request::input('apellidos');

		$docentes->save();
		return redirect()->route('docentes.index', ['docente' => $id])->with('message', 'Cambios guardados')->with('nombre',$nombre);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$docentes = \App\Docente::find($id);

		$docentes->delete();

		return redirect()->route('docentes.index')->with('message', 'Docente Eliminado con éxito');
	}

}
