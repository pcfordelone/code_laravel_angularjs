<?php

namespace FRD\Transformers;

use FRD\Entities\Project;
use League\Fractal\TransformerAbstract;


class ProjectTransformer extends TransformerAbstract
{

    protected $defaultIncludes = ['members', 'tasks', 'notes'];

    public function transform(Project $project)
    {
        return [
            'id'            => $project->id,
            'name'          => $project->name,
            'description'   => $project->description,
            'progress'      => $project->progress,
            'status'        => $project->status,
            'duo_date'      => $project->duo_date,
            'created_at'    => $project->created_at,
            'updated_at'    => $project->updated_at
        ];
    }

    public function includeMembers(Project $project)
    {
        return $this->collection($project->project_members, new ProjectMemberTransformer());
    }

    public function includeTasks(Project $project)
    {
        return $this->collection($project->project_tasks, new ProjectTaskTransformer());
    }

    public function includeNotes(Project $project)
    {
        return $this->collection($project->project_notes, new ProjectNoteTransformer());
    }

}