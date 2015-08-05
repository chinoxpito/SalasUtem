<?php namespace App\Http\Controllers;

use App\Http\Requests\StoreHorarioRequest;
use App\Http\Requests\UpdateHorarioRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class HorariosController extends Controller {
			/**
			 * Display a listing of the resource.
			 *
			 * @return Response
			 */
			public function index(Request $request)
			{
				$usuario = Auth::user();
				$nombre = $usuario->estudiante->nombres;
			
				$cursos = \App\Curso::all();
				$cursos_list = array();
				foreach ($cursos as $curso) {
					$cursos_list[$curso->id] = sprintf('%s (Seccion %d)', $curso->asignatura->nombre,
						$curso->seccion);
				}
				return view("horarios.index", compact('horarios'))->with('curso',$cursos_list)
																			->with('horarios', \App\Horario::name($request->get("name"))->paginate(5)
																			->setPath('horarios'))->with('usuario',$usuario)->with('nombre',$nombre);
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
				$periodo = \App\Periodo::lists('bloque','id');
				$sala = \App\Sala::lists('nombre','id');
				$cursos = \App\Curso::all();
				$cursos_list = array();
				foreach ($cursos as $curso) {
					$cursos_list[$curso->id] = sprintf('%s (Seccion %d)', $curso->asignatura->nombre,
						$curso->seccion);
				}
				$asignatura = \App\Asignatura::lists('nombre','id');
				return view('horarios.create')->with('periodo',$periodo)
																			->with('salas',$sala)
																			->with('curso',$cursos_list)
																			->with('asignatura',$asignatura)
																			->with('usuario',$usuario)->with('nombre',$nombre);
			}
			/**
			 * Store a newly created resource in storage.
			 *
			 * @return Response
			 */
			public function store(StoreHorarioRequest $request)
			{
					$usuario = Auth::user();
					$inicio = $request->input('fechaInicial');
					$horario = new \App\Horario;
					$horario->fecha = $request->input('fechaInicial');
					$horario->sala_id = $request->input('salas_id');
					$horario->periodo_id = $request->input('periodo_id');
					$horario->curso_id= $request->input('curso_id');
					$horario->save();
					//$fin = $request->input('fechaFinal');
					$fechaInicial = date_create($request->input('fechaInicial'));
					$fechaFinal = date_create($request->input('fechaFinal'));
					(int)$diferenciaEnSemanas = $fechaInicial->diff($fechaFinal)
																									 ->format('%R%a días')/7;
					for($i=1; $i<=$diferenciaEnSemanas; $i++)
					{
						$inicio = strtotime ( '+7 day' , strtotime ( $inicio ) ) ;
						$inicio = date ( 'Y-m-j' , $inicio );
						$horario = new \App\Horario;
						$horario->fecha = $inicio;
						$horario->sala_id = $request->input('salas_id');
						$horario->periodo_id = $request->input('periodo_id');
						$horario->curso_id= $request->input('curso_id');
						$horario->save();
					}
				return redirect()->route('horarios.index')->with('message', 'horario Agregado')->with('usuario',$usuario);
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
				$horario = \App\Horario::find($id);
      			$periodo = \App\Periodo::find($horario->periodo_id);
				$sala = \App\Sala::find($horario->sala_id);
				$curso = \App\Curso::find($horario->sala_id);
				return view('horarios.show')->with('horario',$horario)
																		->with('periodo',$periodo)
																		->with('sala',$sala)->with('curso',$curso)
																		->with('usuario',$usuario)->with('nombre',$nombre);
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
				$periodos = \App\Periodo::lists('bloque','id');
				$salas = \App\Sala::lists('nombre','id');
				$cursos = \App\Curso::all();
				$cursos_list = array();
				foreach ($cursos as $curso) {
					$cursos_list[$curso->id] = sprintf('%s (Seccion %d)', $curso->asignatura->nombre,
						$curso->seccion);
				}
				$asignaturas = \App\Asignatura::lists('nombre','id');
				return view('horarios.edit')->with('horario', \App\Horario::find($id))
				                            ->with('periodos',$periodos)
				                            ->with('salas', $salas)
			                              ->with('asignaturas', $asignaturas)
																		->with('curso',$cursos_list)
			                              ->with('usuario',$usuario)->with('nombre',$nombre);
			}
			/**
			 * Update the specified resource in storage.
			 *
			 * @param  int  $id
			 * @return Response
			 */
			public function update(UpdateHorarioRequest $request, $id)
			{
				$usuario = Auth::user();
				$horario = \App\Horario::find($id);
				$horario->fecha = $request->input('fecha');
				$horario->sala_id = $request->input('sala_id');
				$horario->periodo_id = $request->input('periodo_id');
				$horario->curso_id = $request->input('curso_id');
				$horario->save();
				return redirect()->route('horarios.index', ['horario' => $id])->with('message', 'Cambios guardados')->with('usuario',$usuario);
			}
			/**
			 * Remove the specified resource from storage.
			 *
			 * @param  int  $id
			 * @return Response
			 */
			public function destroy($id)
			{
				$usuario = Auth::user();
				$horario = \App\Horario::find($id);
				$horario->delete();
				return redirect()->route('horarios.index')->with('message', 'Horario eliminado con éxito')->with('usuario',$usuario);
			}
		}
