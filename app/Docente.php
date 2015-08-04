<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model {

	protected $table = 'docentes';
	protected $fillable = ['nombres','apellidos','rut','departamento_id'];
	protected $guarded = ['id'];

}
