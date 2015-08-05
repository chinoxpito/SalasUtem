<?php namespace App\Http\Controllers;

use App\Http\Requests\StoreCursoRequest;
use App\Http\Requests\UpdateCursosRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Docente;
use Auth;

class CursosController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$usuario = Auth::user();
		$nombre = $usuario->estudiante->nombres;
		$cursos = \App\Curso::paginate(5);
		
		return view("cursos.index", compact('cursos'))->with('nombre',$nombre);
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
		$asignatura = \App\Asignatura::lists('nombre','id');
		$docente = \App\Docente::lists('nombres','id');
		return view('cursos.create')->with('docente',$docente)->with('asignatura',$asignatura)->with('nombre',$nombre);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(storeCursoRequest $request)
	{
		$usuario = Auth::user();
		$nombre = $usuario->estudiante->nombres;		
		
		$curso = new \App\Curso;

		$curso->semestre = $request->input('semestre');
			$curso->seccion = $request->input('seccion');
			$curso->anio = $request->input('anio');
			$curso->asignatura_id = $request->input('asignatura_id');
			$curso->docente_id = $request->input('docente_id');
		$curso->save();
		
		return redirect()->route('cursos.index')->with('message', 'curso agregado')->with('nombre',$nombre);
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
		$cursos = \App\Curso::find($id);
		$docente= \App\Docente::find($cursos->docente_id);
		$asignatura= \App\Asignatura::find($cursos->asignatura_id);
		return view('cursos.show')->with('curso',$cursos)->with('docente',$docente)->with('asignatura',$asignatura)->with('nombre',$nombre);
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
		$docente = \App\Docente::lists('nombres','id');
		$asignatura = \App\Asignatura::lists('nombre','id');
		return view('cursos.edit')->with('curso', \App\Curso::find($id))->with('docente',$docente)->with('asignatura',$asignatura)->with('nombre',$nombre);
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
		$cursos = \App\Curso::find($id);

		$cursos->semestre = \Request::input('semestre');
		$cursos->seccion = \Request::input('seccion');
		$cursos->anio = \Request::input('anio');
		$cursos->asignatura_id = \Request::input('asignatura_id');
		$cursos->docente_id = \Request::input('docente_id');

		$cursos->save();
		return redirect()->route('cursos.index', ['curso' => $id])->with('message', 'Cambios guardados')->with('nombre',$nombre);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		
		$cursos = \App\Curso::find($id);

		$cursos->delete();

		return redirect()->route('cursos.index')->with('message', 'curso eliminado con éxito');
	}

}
