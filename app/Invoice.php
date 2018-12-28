<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'number_invoice', 'fiscal_number', 'client', 'business_name', 'rfc', 'concept', 'date',
        'ammount', 'status', 'payment_date', 'observations', 'commission_provider',
    ];

    public function sale()
    {
        return $this->belongsTo('App\Sale');
    }
}
