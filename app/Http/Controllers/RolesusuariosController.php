<?php namespace App\Http\Controllers;

use App\Http\Requests\StoreRolesUsuariosRequest;
use App\Http\Requests\UpdateRolesUsuariosRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Role;
use Auth;

class RolesusuariosController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$usuario = Auth::user();
		$nombre = $usuario->estudiante->nombres;
		$rolesusuarios = \App\Rolusuario::paginate(5);
		
		return view("rolesusuarios.index", compact('rolesusuarios'))->with('nombre',$nombre);
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
		$rol= \App\Rol::lists('nombre','id');
		return view('rolesusuarios.create')->with('rol',$rol)->with('nombre',$nombre);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(StoreRolesUsuariosRequest $request)
	{
		$usuario = Auth::user();
		$nombre = $usuario->estudiante->nombres;
		$rolesusuarios = new \App\Rolusuario;

		$rolesusuarios->rut = $request->input('rut');
		$rolesusuarios->rol_id = $request->input('rol_id');

		$rolesusuarios->save();
	
	return redirect()->route('rolesusuarios.index')->with('message', 'Rol Agregado')->with('nombre',$nombre);
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
		$rolesusuarios = \App\Rolusuario::find($id);
		$rol = \App\Rol::find($rolesusuarios->rol_id);
		
		return view('rolesusuarios.show')->with('rolusuario',$rolesusuarios)->with('rol',$rol)->with('nombre',$nombre);
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
		$rol= \App\Rol::lists('nombre','id');
		return view('rolesusuarios.edit')->with('rolusuario', \App\Rolusuario::find($id))->with('rol',$rol)->with('nombre',$nombre);
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
		$rolesusuarios = \App\Rolusuario::find($id);

		$rolesusuarios->rut = \Request::input('rut');
		$rolesusuarios->rol_id = \Request::input('rol_id');

		$rolesusuarios->save();
		return redirect()->route('rolesusuarios.index', ['rolusuario' => $id])->with('message', 'Cambios guardados')->with('nombre',$nombre);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$rolesusuarios = \App\Rolusuario::find($id);

		$rolesusuarios->delete();

		return redirect()->route('rolesusuarios.index')->with('message', 'Rol Eliminado');
	}

}
