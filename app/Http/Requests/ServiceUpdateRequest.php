<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ServiceUpdateRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return Auth::check();
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, mixed>
	 */
	public function rules()
	{
		return [
			'name' => 'required|string|max:255',
			'icon' => 'required|string|max:255',
			'icon_background' => 'nullable|array',
			'category_id' => 'required|integer|exists:categories,id',
			'detail' => 'required|string|max:255',
			'motto' => 'required|string|max:255',
			'images' => 'nullable|array',
			'images.*' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048'
		];
	}
}
