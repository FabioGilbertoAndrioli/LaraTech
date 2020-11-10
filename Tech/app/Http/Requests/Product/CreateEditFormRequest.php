<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class CreateEditFormRequest extends FormRequest
{
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
            'name' => 'required|min:3|max:255',
            'price' => 'numeric',
        ];
    }

    public function messages()
{
    return [
        'name.required' => 'O nome do produto é obrigatório',
        'price.numeric' => 'Tipo de dado inválido',
    ];
}
}
