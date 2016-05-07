<?php

namespace FRD\Entities;

use Illuminate\Database\Eloquent\Model;

class ProjectMember extends Model
{

    protected $fillable = [
        'project_id',
        'user_id'
    ];

    public function projects()
    {
        return $this->belongsToMany(Project::class, '');
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }

}
