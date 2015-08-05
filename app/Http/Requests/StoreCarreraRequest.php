<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreCarreraRequest extends Request {

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
			"nombre" => "required|min:5|max:70",
			"escuela_id" => "required",
			"codigo" => "required|min:4|max:8",
			"descripcion" => "min:3|max:100"

		];
	}

}
