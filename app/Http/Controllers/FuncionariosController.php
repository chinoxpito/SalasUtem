<?php namespace App\Http\Controllers;

use App\Http\Requests\StoreFuncionarioRequest;
use App\Http\Requests\UpdateFuncionarioRequest;
use App\Http\Controllers\Controller;
use App\Departamento;
use Illuminate\Http\Request;
use Auth;

class FuncionariosController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$usuario = Auth::user();
		$nombre = $usuario->estudiante->nombres;
		$funcionarios = \App\Funcionario::paginate(5);
		
		return view("funcionarios.index", compact('funcionarios'))->with('nombre',$nombre);
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
		return view('funcionarios.create')->with('departamento',$departamento)->with('nombre',$nombre);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(StoreFuncionarioRequest $request)
	{
		$usuario = Auth::user();
		$nombre = $usuario->estudiante->nombres;
		$funcionarios = new \App\Funcionario;

		$funcionarios->departamento_id = $request->input('departamento_id');
		$funcionarios->rut = $request->input('rut');
		$funcionarios->nombres = ucwords($request->input('nombres'));
		$funcionarios->apellidos = ucwords($request->input('apellidos'));

		$funcionarios->save();

		return redirect()->route('funcionarios.index')->with('message', 'Funcionario Agregado')->with('nombre',$nombre);
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
		$funcionarios = \App\Funcionario::find($id);
		$departamento = \App\Departamento::find($funcionarios->departamento_id);
		return view('funcionarios.show')->with('funcionario',$funcionarios)->with('departamento',$departamento)->with('nombre',$nombre);
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
		return view('funcionarios.edit')->with('funcionario', \App\Funcionario::find($id))->with('departamentos',$departamento)->with('nombre',$nombre);
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
		$funcionarios = \App\Funcionario::find($id);

		$funcionarios->departamento_id = \Request::input('departamento_id');
		$funcionarios->rut = \Request::input('rut');
		$funcionarios->nombres = \Request::input('nombres');
		$funcionarios->apellidos = \Request::input('apellidos');

		$funcionarios->save();
		return redirect()->route('funcionarios.index', ['funcionario' => $id])->with('message', 'Cambios guardados')->with('nombre',$nombre);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$funcionarios = \App\Funcionario::find($id);

		$funcionarios->delete();

		return redirect()->route('funcionarios.index')->with('message', 'Funcionario Eliminado con éxito');
	}

}
