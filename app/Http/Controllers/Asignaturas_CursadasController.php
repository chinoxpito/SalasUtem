<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Departamento;
use App\Curso;
use App\Estudiante;
use Auth;

class Asignaturas_CursadasController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id)
	{
		$usuario = Auth::user();
		$nombre = $usuario->estudiante->nombres;
		$estudiante = \App\Estudiante::find($id);
		$curso = \App\Curso::paginate(5);
		//dd($estudiante);
		return view("asignaturas_cursadas.index", compact('estudiantes'))->with('asignaturas_cursadas', \App\Asignatura_Cursada::paginate(5)->setPath('asignaturas_cursadas'))->with('curso',$curso)->with('estudiante',$estudiante)->with('nombre',$nombre);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($id)
	{
		$usuario = Auth::user();
		$nombre = $usuario->estudiante->nombres;
		$estudiante = \App\Estudiante::find($id);
		$curso = \App\Curso::lists('seccion','id');
		return view('asignaturas_cursadas.create')->with('curso',$curso)->with('estudiante',$estudiante)->with('nombre',$nombre);
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
		$asignaturas_cursadas = new \App\Asignatura_Cursada;

		$asignaturas_cursadas->curso_id = \Request::input('curso_id');
		$asignaturas_cursadas->estudiante_id = \Request::input('estudiante_id');
		

		$asignaturas_cursadas->save();
		$estudiante =  \App\Estudiante::find($asignaturas_cursadas->estudiante_id);

		return redirect()->route('estudiantes.asignaturas_cursadas.index',[$estudiante->id])->with('message', 'Asignaturas Agregado')->with('nombre',$nombre);
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
	public function destroy($id_estudiante, $id_curso)
	{
		
		$curso = Curso::find($id_curso);
		$estudiante = Estudiante::find($id_estudiante);
		
		$estudiante->cursos()->detach($curso);

		return redirect()->route('estudiantes.asignaturas_cursadas.index',[$id_estudiante])->with('message', 'asignaturas Eliminado con éxito');
	
	}

}
