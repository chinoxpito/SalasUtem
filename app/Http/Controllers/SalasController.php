<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Campus;
use App\Tipo_Sala;
use Auth;

class SalasController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$usuario = Auth::user();
		$nombre = $usuario->estudiante->nombres;
		$salas = \App\Sala::paginate(5);
		
		return view("salas.index", compact('salas'))->with('nombre',$nombre);
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
		$campu = Campus::lists('nombre','id');
		$tipo_sala = Tipo_Sala::lists('nombre','id');
		return view('salas.create')->with('campus',$campu)->with('tipos_salas',$tipo_sala)->with('nombre',$nombre);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$usuario = Auth::user();
		$nombre = $usuario->estudiante->nombres;
		$salas = new \App\Sala;

		$salas->campus_id = \Request::input('campus_id');
		$salas->tipo_sala_id = \Request::input('tipos_salas_id');
		$salas->nombre = \Request::input('nombre');
		$salas->descripcion = \Request::input('descripcion');

		$salas->save();

		return redirect()->route('salas.index')->with('message', 'Sala Agregada')->with('nombre',$nombre);
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
		$sala = \App\Sala::find($id);
		$campu = \App\Campus::find($sala->campus_id);
		$tipo_sala = \App\Tipo_Sala::find($sala->tipos_salas_id);
		return view('salas.show')->with('sala',$sala)->with('campus',$campu)->with('tipos_salas',$tipo_sala)->with('nombre',$nombre);
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
		$campu = \App\Campus::lists('nombre','id');
		$tipo_sala = Tipo_Sala::lists('nombre','id');
		return view('salas.edit')->with('sala', \App\Sala::find($id))->with('campus',$campu)->with('tipos_salas',$tipo_sala)->with('nombre',$nombre);
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
		$salas = \App\Sala::find($id);

		$salas->campus_id = \Request::input('campus_id');
		$salas->tipo_sala_id = \Request::input('tipos_salas_id');
		$salas->nombre = \Request::input('nombre');
		$salas->descripcion = \Request::input('descripcion');

		$salas->save();
		return redirect()->route('salas.index', ['sala' => $id])->with('message', 'Cambios guardados')->with('nombre',$nombre);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$salas = \App\Sala::find($id);

		$salas->delete();

		return redirect()->route('salas.index')->with('message', 'Sala Eliminada con éxito');
	}

}
