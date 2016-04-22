<?php

namespace FRD\Entities;

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
