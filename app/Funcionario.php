<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model {

	protected $table = 'funcionarios';
	protected $fillable = ['nombres','rut','apellidos','departamento_id'];
	protected $guarded = ['id'];

}
