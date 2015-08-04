<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model {

	protected $table = 'departamentos';
	protected $fillable = ['nombre','descripcion','facultad_id'];
	protected $guarded = ['id'];

	public function facultad()
	{
		return $this->belongsTo('App\facultad');
	}
}
