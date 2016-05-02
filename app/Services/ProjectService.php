<?php

namespace FRD\Services;

use FRD\Repositories\ProjectRepositoryInterface;
use FRD\Validators\ProjectValidator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
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

    public function find($id)
    {
        try {
            return $this->projectRepository->with(['owner','client'])->find($id);
        } catch (ModelNotFoundException $e) {
            return ['error'=>true, 'Projeto não encontrado.'];
        } catch (\Exception $e) {
            return ['error' => true, 'Ocorreu algum erro ao procurar o projeto.'];
        }
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

        } catch (ModelNotFoundException $e) {
            return ['error'=>true, 'Projeto não pode ser atualizado pois não existe.'];
        } catch (ValidatorException $e) {

            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];

        }
    }

    public function destroy($id)
    {
        $project = $this->find($id);

        try {
            $this->projectRepository->find($id)->delete();
            return ['success'=>true, "Projeto {$project->name} deletado com sucesso!"];
        } catch (ModelNotFoundException $e) {
            return ['error'=>true, 'Projeto não encontrado.'];
        } catch (\Exception $e) {
            return ['error'=>true, 'Ocorreu algum erro ao excluir o projeto.'];
        }
    }
}