<?php

namespace FRD\Services;


use FRD\Repositories\ClientRepositoryInterface;
use FRD\Repositories\ProjectRepositoryInterface;
use FRD\Validators\ClientValidator;
use FRD\Validators\ProjectValidator;
use Prettus\Validator\Exceptions\ValidatorException;

class ProjectService
{
    private $projectRepository;
    private $projectValidator;

    public function __construct(ProjectRepositoryInterface $projectRepository, ProjectValidator $projectValidator)
    {
        $this->projectRepository = $projectRepository;
        $this->projectValidator = $projectValidator;
    }

    public function store(array $data)
    {
        // enviar e-mail
        // disparar notificação
        // postar tweet

        try {
            $this->projectValidator->with($data)->passesOrFail();
            return $this->projectRepository->create($data);

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
            $this->projectValidator->with($data)->passesOrFail();
            return $this->projectRepository->update($data, $id);

        } catch (ValidatorException $e) {

            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];

        }
    }
}