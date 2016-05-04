<?php

namespace FRD\Entities;

use Illuminate\Database\Eloquent\Model;

class ProjectMember extends Model
{

    protected $fillable = [
        'project_id',
        'user_id'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
