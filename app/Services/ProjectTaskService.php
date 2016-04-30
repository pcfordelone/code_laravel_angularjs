<?php

namespace FRD\Services;

use FRD\Repositories\ProjectNoteRepositoryInterface;
use FRD\Repositories\ProjectTaskRepositoryInterface;
use FRD\Validators\ProjectNoteValidator;
use FRD\Validators\ProjectTaskValidator;
use Prettus\Validator\Exceptions\ValidatorException;


class ProjectTaskService
{
    private $projectTaskRepository;
    private $projectTaskValidator;

    public function __construct(ProjectTaskRepositoryInterface $projectTaskRepository, ProjectTaskValidator $projectTaskValidator)
    {
        $this->projectTaskRepository = $projectTaskRepository;
        $this->projectTaskValidator = $projectTaskValidator;
    }

    public function store(array $data)
    {
        // enviar e-mail
        // disparar notificação
        // postar tweet

        try {
            $this->projectTaskValidator->with($data)->passesOrFail();
            return $this->projectTaskRepository->create($data);

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
            $this->projectTaskValidator->with($data)->passesOrFail();
            return $this->projectTaskRepository->update($data, $id);

        } catch (ValidatorException $e) {

            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];

        }
    }
}