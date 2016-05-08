<?php

namespace FRD\Transformers;

use FRD\Entities\ProjectNote;
use FRD\Entities\ProjectTask;
use FRD\Entities\User;
use League\Fractal\TransformerAbstract;


class ProjectTaskTransformer extends TransformerAbstract
{

    public function transform(ProjectTask $task)
    {
        return [
            'id'           => $task->id,
            'name'         => $task->name,
            'description'  => $task->description,
            'start_date'   => $task->start_date,
            'duo_date'     => $task->duo_date,
            'status'       => $task->status,
        ];
    }

}