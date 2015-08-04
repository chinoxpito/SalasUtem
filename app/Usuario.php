<?php namespace App;


use illuminate\Database\Eloquent\Model;

class Usuario extends \UTEM\Dirdoc\Auth\Models\DirdocWSUser {

	public function roles()
    {
        return $this->belongsToMany('App\Rol', 'roles_usuarios', 'rut', 'rol_id');
    }
    public function estudiante()
    {
    	return $this->hasOne('App\Estudiante', 'rut', 'rut');
    }

}