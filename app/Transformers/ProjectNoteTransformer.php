<?php

namespace FRD\Transformers;

use FRD\Entities\ProjectNote;
use FRD\Entities\User;
use League\Fractal\TransformerAbstract;


class ProjectNoteTransformer extends TransformerAbstract
{

    public function transform(ProjectNote $note)
    {
        return [
            'id'           => $note->id,
            'title'        => $note->title,
            'note'         => $note->note,
        ];
    }

}