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

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
