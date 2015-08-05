<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCampusRequest;
use App\Http\Requests\UpdateCampusRequest;
use Illuminate\Http\Request;
use Auth;

class CampusController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//$campus = Campus::all(); // Cambiar esto, si la db es muy grande queda la escoba
		
		$usuario = Auth::user();
		$nombre = $usuario->estudiante->nombres;
		$campus = \App\Campus::paginate(5);
		
		return view('campus.index', compact('campus'))->with('nombre',$nombre);
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
		

		return view('campus.create')->with('nombre',$nombre);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(StoreCampusRequest $request)
	{
		$usuario = Auth::user();
		$campus = new \App\Campus;

		$campus->nombre = ucwords($request->input('nombre'));
		$campus->direccion = ucwords($request->input('direccion'));
		$campus->latitud = $request->input('latitud');
		$campus->longitud = $request->input('longitud');
		$campus->descripcion = ucfirst($request->input('descripcion'));
		$campus->rut_encargado = $request->input('rut_encargado');

		$campus->save();

		return redirect()->route('campus.index')->with('message', 'Campus Agregado')->with('usuario',$usuario);
		



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
		

		$campus = \App\Campus::find($id);
		if($campus)
			return view('campus.show')->with('campu', $campus)->with('nombre', $nombre);
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
		$usuario = Auth::user();
		$nombre = $usuario->estudiante->nombres;
		return view('campus.edit')->with('campu', \App\Campus::find($id))->with('nombre', $nombre);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(UpdateCampusRequest $request, $id)
	{
		$usuario = Auth::user();
		$campus = \App\Campus::find($id);
		$campus->nombre = ucwords($request->input('nombre'));
		$campus->direccion = ucwords($request->input('direccion'));
		$campus->latitud = $request->input('latitud');
		$campus->longitud = $request->input('longitud');
		$campus->descripcion = ucfirst($request->input('descripcion'));
		$campus->rut_encargado = $request->input('rut_encargado');
		$campus->save();
		return redirect()->route('campus.index', ['campu' => $id])->with('message', 'Cambios guardados')->with('usuario',$usuario);
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
