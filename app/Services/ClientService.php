<?php

namespace FRD\Services;


use FRD\Repositories\ClientRepositoryInterface;

class ClientService
{
    private $clientRepository;

    public function __construct(ClientRepositoryInterface $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function store(array $data)
    {
        // enviar e-mail
        // disparar notificação
        // postar tweet

        return $this->clientRepository->create($data);
    }

    public function update(array $data, $id)
    {
        // enviar e-mail
        // disparar notificação
        // postar tweet

        return $this->clientRepository->update($data, $id);
    }
}