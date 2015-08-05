<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//Route::get('/', 'WelcomeController@index');
//Route::get('home', 'HomeController@index');
/*Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);*/
Route::controller('auth', 'Auth\AuthController', [
    'getLogin'  => 'auth.login',
    'postLogin' => 'auth.doLogin',
    'getLogout' => 'auth.logout'
]);
/*Route::get('/', function() {
    return redirect()->route('backend.dashboard'); // TODO: Hacer esto de mejor forma!
});
Route::group(['prefix' => 'backend', 'namespace' => 'Backend', 'middleware' => ['auth']], function(){
    Route::get('dashboard', [
        'uses' => 'DashboardController@home',
        'as'   => 'backend.dashboard'
    ]);
    Route::resource('campus', 'CampusController');
});
*/
//Route::resource('post', 'PostController');
Route::resource('/','AutentiController');



Route::resource('autenti','AutentiController');


Route::group(['middleware' => 'administrador'], function()
{
  Route::resource('admi','AdmiController');
  Route::resource('campus','CampusController');
  Route::resource('facultades','FacultadesController');
  Route::resource('departamentos','DepartamentosController');
  Route::resource('escuelas','EscuelasController');
  Route::resource('carreras','CarrerasController');
  Route::resource('funcionarios','FuncionariosController');
  Route::resource('docentes','DocentesController');
  Route::resource('estudiantes','EstudiantesController');
  Route::get('alumno','AdmiController@estudindex');
  Route::resource('estudiantes.asignaturas_cursadas','Asignaturas_CursadasController');
  Route::resource('rolesusuarios','RolesusuariosController');
  Route::resource('roles','RolesController');
  
});

Route::group(['middleware' => 'encargado'], function()
{
  Route::resource('encar','EncarController');
  Route::resource('asignaturas','AsignaturasController');
  Route::resource('cursos','CursosController');
  Route::resource('periodos','PeriodosController');
  Route::resource('salas','SalasController');
  Route::resource('tipos_salas','Tipos_SalasController');
  Route::resource('horarios','HorariosController');
});

Route::group(['middleware' => 'alumno'], function()
{
  Route::resource('estudi','EstudiController');
  Route::get('alumnos','AdmiController@estudindex');
});

Route::get('/alumno', ['middleware' => ['auth','alumno'],'as'=>'alumnos.index','uses'=> 'AdmiController@inicioAlumno']);
Route::get('/encar', ['middleware' => ['auth','encargado'],'as'=>'encar.index','uses'=> 'EncarController@index']);
Route::get('/admi', ['middleware' => ['auth','administrador'],'as'=>'admi.index','uses'=> 'AdmiController@index']);
