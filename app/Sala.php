<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Sala extends Model {

	protected $table = 'salas';
	protected $fillable = ['campus_id','tipo_sala_id','nombre','descripcion'];
	protected $guarded = ['id'];

	public function tipo_sala()
	{
        return $this->belongsTo('App\Tipo_Sala');
	}

}
