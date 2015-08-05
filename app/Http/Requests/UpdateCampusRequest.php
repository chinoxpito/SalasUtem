<?php namespace App\Http\Requests;
use App\Http\Requests\Request;
class UpdateCampusRequest extends Request {
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
				"nombre" => "required|min:3|max:40",
				"direccion" => "required|min:5|max:100",
				"latitud" => "required|numeric",
				"longitud" => "required|numeric",
				"descripcion" => "min:3|max:100",
				"rut_encargado" => "required|min:3|max:8"
		];
	}
}