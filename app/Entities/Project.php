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

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function project_notes()
    {
        return $this->hasMany(ProjectNote::class);
    }

    public function project_tasks()
    {
        return $this->hasMany(ProjectTask::class);
    }

    public function project_members()
    {
        return $this->hasMany(ProjectMember::class);
    }
}
