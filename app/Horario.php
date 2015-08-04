<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model {

	protected $table = 'horarios';
	protected $fillable = ['fecha'];
	protected $guarded = ['id','sala_id','periodo_id','curso_id'];

    public function sala()
    {
        return $this->belongsTo('App\Sala');
    }
    public function periodo()
    {
        return $this->belongsTo('App\Periodo');
    }
		public function docente()
		{
				return $this->belongsTo('App\Docente');
		}
    public function curso()
    {
        return $this->belongsTo('App\Curso');
    }
    public function scopeName($query, $name)
    {
            //dd('scope: '.$name);
            if($name != "")
            {
            $query->where('fecha', ucwords($name));
            }
    }
}
