<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'date', 'provider', 'client', 'passenger', 'key', 'destination',
        'route', 'departure_date', 'schedule', 'unit_price', 'commission_price',
        'tdc', 'payment_status', 'way_to_pay', 'invoice', 'paid_out', 'debt',
    ];

    public function invoice()
    {
        return $this->hasOne('App\Invoice');
    }
}
