<?php

namespace FRD\Entities;

use Illuminate\Database\Eloquent\Model;

class ProjectTask extends Model
{
    protected $fillable = [
        'name',
        'description',
        'start_date',
        'duo_date',
        'project_id',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
