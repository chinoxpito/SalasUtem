<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model {

	protected $table = 'carreras';
	protected $fillable = ['nombre','descripcion','codigo','escuela_id'];
	protected $guarded = ['id'];

}
