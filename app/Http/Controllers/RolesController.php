<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;

class RolesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$usuario = Auth::user();
		$nombre = $usuario->estudiante->nombres;
		$roles = \App\Rol::paginate(5);
		
		return view("roles.index", compact('roles'))->with('nombre',$nombre);
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
		return view('roles.create')->with('nombre',$nombre);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(	)
	{
		$usuario = Auth::user();
		$nombre = $usuario->estudiante->nombres;
		$roles = new \App\Rol;

		$roles->nombre = \Request::input('nombre');
		$roles->descripcion = \Request::input('descripcion');

		$roles->save();

		return redirect()->route('roles.index')->with('message', 'Rol Agregado')->with('nombre',$nombre);
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
		$roles = \App\Rol::find($id);

		return view('roles.show')->with('rol',$roles)->with('nombre',$nombre);
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
		return view('roles.edit')->with('rol', \App\Rol::find($id))->with('nombre',$nombre);
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
		$roles = \App\Rol::find($id);

		$roles->nombre = \Request::input('nombre');
		$roles->descripcion = \Request::input('descripcion');

		$roles->save();
		return redirect()->route('roles.index', ['rol' => $id])->with('message', 'Cambios guardados')->with('nombre',$nombre);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$roles = \App\Rol::find($id);

		$roles->delete();

		return redirect()->route('roles.index')->with('message', 'Rol Eliminado');
	}

}
