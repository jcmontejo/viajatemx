<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class sendQuotation extends FormRequest
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
            'attended' => 'required',
            'medium' => 'required',
            'date_send' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'date_send.required' => 'El campo fecha de envío es obligatorio.',
        ];
    }

}
