<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateEstudianteRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			"carrera_id" => "required",
			"rut" => "required|min:7|max:9",
			"nombres" => "required|min:3|max:40",
			"apellidos" => "required|min:3|max:40",
			"email" => "required|email"
		];
	}

}
