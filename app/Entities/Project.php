<?php

namespace FRD\Entities;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'description',
        'progress',
        'status',
        'duo_date',
        'owner_id',
        'client_id',
    ];
}
