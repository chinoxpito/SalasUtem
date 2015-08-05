<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreCursoRequest extends Request {

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
			"semestre" => "required|integer",
			"seccion" => "required|integer|max:99999",
			"anio" => "required|integer",
			"asignatura_id" => "required",
			"docente_id" => "required"

		];
	}

}
