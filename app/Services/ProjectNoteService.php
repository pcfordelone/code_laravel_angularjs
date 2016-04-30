<?php

namespace FRD\Services;

use FRD\Repositories\ProjectNoteRepositoryInterface;
use FRD\Validators\ProjectNoteValidator;
use Prettus\Validator\Exceptions\ValidatorException;


class ProjectNoteService
{
    private $projectNoteRepository;
    private $projectNoteValidator;

    public function __construct(ProjectNoteRepositoryInterface $projectNoteRepository, ProjectNoteValidator $projectNoteValidator)
    {
        $this->projectNoteRepository = $projectNoteRepository;
        $this->projectNoteValidator = $projectNoteValidator;
    }

    public function store(array $data)
    {
        // enviar e-mail
        // disparar notificação
        // postar tweet

        try {
            $this->projectNoteValidator->with($data)->passesOrFail();
            return $this->projectNoteRepository->create($data);

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
            $this->projectNoteValidator->with($data)->passesOrFail();
            return $this->projectNoteRepository->update($data, $id);

        } catch (ValidatorException $e) {

            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];

        }
    }
}