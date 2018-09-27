<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public $fillable = [
        'brand', 'name', 'birthdate', 'phone', 'email', 'suscribe', 'fiscal_data', 'airline_accounts'
    ];
}
