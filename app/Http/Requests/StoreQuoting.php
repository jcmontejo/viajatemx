<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuoting extends FormRequest
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
            'name_client' => 'required',
            'concept' => 'required',
            'destination' => 'required',
            'phone' => 'required|digits:10',
            'email' => 'required|email',
            // 'birthdate' => 'required|date|date_format:Y-m-d',
        ];
    }

    public function messages()
    {
        return [
            'name_client.required' => 'El campo nombre es obligatorio.',
            'concept.required' => 'El campo concepto es obligatorio.',
            'destination.required' => 'El campo destino es obligatorio.',
            'phone.required' => 'El campo teléfono es obligatorio.',
            'email.required' => 'El campo correo electrónico es obligatorio.',
            // 'birthdate.required' => 'El campo cumpleaños es obligatorio.',
            'phone.digits' => 'El campo teléfono debe ser un número de 10 dígitos.',
            // 'birthdate.date_format' => 'El campo cumpleaños no corresponde con el formato de fecha.',
        ];
    }
}
