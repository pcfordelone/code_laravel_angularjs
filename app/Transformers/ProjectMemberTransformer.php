<?php

namespace FRD\Transformers;

use FRD\Entities\User;
use League\Fractal\TransformerAbstract;


class ProjectMemberTransformer extends TransformerAbstract
{

    public function transform(User $member)
    {
        return [
            'id'            => $member->id,
            'name'          => $member->name,
            'email'         => $member->email,
        ];
    }

}