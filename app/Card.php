<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = [
        'name_bank', 'name_account', 'key', 'account_name'
    ];
}
