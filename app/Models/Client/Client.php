<?php

namespace FRD\Models\Client;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'type',
        'name',
        'responsible',
        'email',
        'phone',
        'adress',
        'obs'
    ];
}
