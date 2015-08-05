<?php namespace App\Http\Controllers;


use App\Http\Requests\StoreCarreraRequest;
use App\Http\Requests\UpdateCarreraRequest;
use App\Http\Controllers\Controller;
use App\Escuela;
use Illuminate\Http\Request;
use Auth;

class CarrerasController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$usuario = Auth::user();
		$nombre = $usuario->estudiante->nombres;
		$carreras = \App\Carrera::paginate(5);
		
		return view("carreras.index", compact('carreras'))->with('nombre',$nombre);
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
		$escuela = \App\Escuela::lists('nombre','id');
		return view('carreras.create')->with('escuela',$escuela)->with('nombre',$nombre);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(StoreCarreraRequest $request)
	{
		$usuario = Auth::user();
		$nombre = $usuario->estudiante->nombres;
		$carrera = new \App\Carrera;

		$carrera->codigo = $request->input('codigo');
		$carrera->nombre = ucwords($request->input('nombre'));
		$carrera->escuela_id = $request->input('escuela_id');
		$carrera->descripcion = ucfirst($request->input('descripcion'));
		$carrera->save();

		return redirect()->route('carreras.index')->with('message', 'Carrera Agregada')->with('nombre',$nombre);
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
		$carreras = \App\Carrera::find($id);
		$escuela = \App\Escuela::find($carreras->escuela_id);
		return view('carreras.show')->with('carrera',$carreras)->with('escuela',$escuela)->with('nombre',$nombre);

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
		$escuela = \App\Escuela::lists('nombre','id');
		return view('carreras.edit')->with('carrera', \App\Carrera::find($id))->with('escuelas',$escuela)->with('nombre',$nombre);
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
		$carreras = \App\Carrera::find($id);

		$carreras->codigo = \Request::input('codigo');
		$carreras->nombre = \Request::input('nombre');
		$carreras->descripcion = \Request::input('descripcion');
		$carreras->escuela_id = \Request::input('escuela_id');

		$carreras->save();
		return redirect()->route('carreras.index', ['carrera' => $id])->with('message', 'Cambios guardados')->with('nombre',$nombre);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$carrera = \App\Carrera::find($id);

		$carrera->delete();

		return redirect()->route('carreras.index')->with('message', 'Carrera Eliminada con éxito');
	}

}
