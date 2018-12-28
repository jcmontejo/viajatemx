<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    protected $fillable = [
        'concept', 
        'destination', 
        'departure_date',
        'return_date',
        'transport',
        'phone', 
        'email',
        'facebook', 
        'suscribe', 
        'trip_description', 
        'attended', 
        'send', 
        'date_send', 
        'medium', 
        'status',
        'file'
    ];
}
