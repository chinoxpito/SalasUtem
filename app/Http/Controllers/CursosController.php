<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CursosController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view("cursos.index")->with('cursos', \App\Curso::paginate(5)->setPath('curso'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$asignatura = \App\Asignatura::lists('nombre','id');
		$docente = \App\Docente::lists('nombres','id');
		return view('cursos.create')->with('docente',$docente)->with('asignatura',$asignatura);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
				
		
		$cursos = new \App\Curso;

		$cursos->semestre = \Request::input('semestre');
		$cursos->seccion = \Request::input('seccion');
		$cursos->anio = \Request::input('anio');
		$cursos->asignatura_id = \Request::input('asignatura_id');
		$cursos->docente_id = \Request::input('docente_id');

		$cursos->save();
		
		return redirect()->route('cursos.index')->with('message', 'curso agregado');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		
		$cursos = \App\Curso::find($id);
		$docente= \App\Docente::find($cursos->docente_id);
		$asignatura= \App\Asignatura::find($cursos->asignatura_id);
		return view('cursos.show')->with('curso',$cursos)->with('docente',$docente)->with('asignatura',$asignatura);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		
		$docente = \App\Docente::lists('nombres','id');
		$asignatura = \App\Asignatura::lists('nombre','id');
		return view('cursos.edit')->with('curso', \App\Curso::find($id))->with('docente',$docente)->with('asignatura',$asignatura);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		
		$cursos = \App\Curso::find($id);

		$cursos->semestre = \Request::input('semestre');
		$cursos->seccion = \Request::input('seccion');
		$cursos->anio = \Request::input('anio');
		$cursos->asignatura_id = \Request::input('asignatura_id');
		$cursos->docente_id = \Request::input('docente_id');

		$cursos->save();
		return redirect()->route('cursos.index', ['curso' => $id])->with('message', 'Cambios guardados');
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
