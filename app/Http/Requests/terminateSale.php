<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class terminateSale extends FormRequest
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
            'idQuotation' => 'required',
            'tdc' => 'required',
            'date' => 'required|date',
            'provider' => 'required',
            'passenger' => 'required',
            'key' => 'required',
            'departure_date' => 'required',
            'schedule' => 'required',
            'unit_price' => 'required|numeric',
            'commission_price' => 'required|numeric',
            'payment_status' => 'required',
            'way_to_pay' => 'required',
            'paid_out' => 'required',
            'route' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'idQuotation.required' => 'El campo id es obligatorio.',
            'tdc.required' => 'El campo TDC es obligatorio.',
            'date.required' => 'El campo fecha de salida es obligatorio.',
            'provider.required' => 'El campo proveedor es obligatorio.',
            'passenger.required' => 'El campo nombre del pasajero es obligatorio.',
            'key.required' => 'El campo clave es obligatorio.',
            'departure_date.required' => 'El campo fecha de salida es obligatorio.',
            'schedule.required' => 'El campo horario de salida es obligatorio.',
            'unit_price.required' => 'El campo precio unitario es obligatorio.',
            'commission_price.required' => 'El campo precio comisión es obligatorio.',
            'payment_status.required' => 'El campo estatus de pago es obligatorio.',
            'paid_out.required' => 'El campo total pagado es obligatorio.',
            'way_to_pay.required' => 'El campo método de pago es obligatorio.'
        ];
    }
}
