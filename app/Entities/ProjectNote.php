<?php

namespace FRD\Entities;

use Illuminate\Database\Eloquent\Model;

class ProjectNote extends Model
{
    protected $fillable = [
        'title',
        'note',
        'project_id'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
