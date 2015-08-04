<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Facultad extends Model {

	protected $table = 'facultades';
	protected $fillable = ['nombre','descripcion','campus_id'];
	protected $guarded = ['id'];

}
