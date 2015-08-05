<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateCursosRequest extends Request {

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
			"asignatura_id" => "required",
			"docente_id" => "required",
			"semestre" => "required|integer",
			"anio" => "required|integer",
			"seccion" => "required|integer|max:99999"
		];
	}

}
