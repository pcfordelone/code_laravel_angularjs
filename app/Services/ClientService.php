<?php

namespace FRD\Services;


use FRD\Repositories\ClientRepositoryInterface;
use FRD\Validators\ClientValidator;
use Prettus\Validator\Exceptions\ValidatorException;

class ClientService
{
    private $clientRepository;
    private $clientValidator;

    public function __construct(ClientRepositoryInterface $clientRepository, ClientValidator $validator)
    {
        $this->clientRepository = $clientRepository;
        $this->clientValidator = $validator;
    }

    public function store(array $data)
    {
        // enviar e-mail
        // disparar notificação
        // postar tweet

        try {
            $this->clientValidator->with($data)->passesOrFail();
            return $this->clientRepository->create($data);

        } catch (ValidatorException $e) {

            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];

        }

    }

    public function update(array $data, $id)
    {
        // enviar e-mail
        // disparar notificação
        // postar tweet

        try {
            $this->clientValidator->with($data)->passesOrFail();
            return $this->clientRepository->update($data, $id);

        } catch (ValidatorException $e) {

            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];

        }
    }
}