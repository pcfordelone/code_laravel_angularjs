<?php

namespace FRD\Transformers;

use FRD\Entities\Client;
use League\Fractal\TransformerAbstract;


class ClientTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [];

    public function transform(Client $client)
    {
        return [
            'id'            => $client->id,
            'type'          => $client->type,
            'name'          => $client->name,
            'responsible'   => $client->responsible,
            'email'         => $client->email,
            'phone'         => $client->phone,
            'adress'        => $client->adress,
            'obs'           => $client->obs,
        ];
    }
}