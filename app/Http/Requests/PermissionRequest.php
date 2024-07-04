<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules()
    {
        return [
            'description' => 'required|max:250',
            'permissions_user' => 'required|array',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages()
    {
        return [
            'description.required' => 'El campo descripción es obligatorio.',
            'description.max' => 'El descripción no puede tener más de 250 caracteres.',
            'permissions_user.required' => 'El campo permissions_user es obligatorio.',
            'permissions_user.array' => 'El campo permissions_user debe ser un array.',
        ];
    }
}
