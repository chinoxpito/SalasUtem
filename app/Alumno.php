<?php namespace App;
use Illuminate\Database\Eloquent\Model;
class Alumno extends Model {
	protected $table = 'estudiantes';
    protected $fillable = ['carrera_id','rut','nombres','apellidos','email'];
    protected $guarded = ['id'];
	public function carrera()
    {
        return $this->belongsTo('App\Carrera');
    }
    public function periodo()
    {
        return $this->belongsTo('App\Periodo');
    }
}