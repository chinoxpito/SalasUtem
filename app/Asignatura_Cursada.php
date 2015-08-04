<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignatura_Cursada extends Model {

	protected $table = 'asignaturas_cursadas';
	protected $fillable = ['curso_id','estudiante_id'];
	protected $guarded = ['id'];

	public function estudiantes()
	{
		return $this->belongsToMany('App\Estudiante');
	}

	public function cursos()
	{
		return $this->belongsToMany('App\Curso');
	}

	public function asignatura()
	{
		return $this->belongsToMany('App\asignaturas');
	}
	

}