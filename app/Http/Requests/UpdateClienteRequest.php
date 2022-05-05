<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClienteRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nombre'=>'required|string|max:255',
            'dni'=> 'required|string|size:9|',
            
        ];
    }

    public function messages()
{
    return [
        'nombre.required' => 'El campo nombre es requerido',
        'dni.required' => 'El campo DNI es requerido',
    ];
}
}
