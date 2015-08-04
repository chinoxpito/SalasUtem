<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_Sala extends Model {

	protected $table = 'tipos_salas';
	protected $fillable = ['nombre','descripcion'];
	protected $guarded = ['id'];
}
