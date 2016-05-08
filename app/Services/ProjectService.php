<?php

namespace FRD\Services;

use FRD\Entities\Project;
use FRD\Entities\ProjectFile;
use FRD\Entities\ProjectMember;
use FRD\Repositories\ProjectRepositoryInterface;
use FRD\Validators\ProjectFileValidator;
use FRD\Validators\ProjectValidator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Prettus\Validator\Exceptions\ValidatorException;


class ProjectService
{
    private $projectRepository;
    private $projectValidator;
    private $projectFileValidator;

    public function __construct(ProjectRepositoryInterface $projectRepository, ProjectValidator $projectValidator, ProjectFileValidator $projectFileValidator)
    {
        $this->projectRepository = $projectRepository;
        $this->projectValidator = $projectValidator;
        $this->projectFileValidator = $projectFileValidator;
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

    public function addMember($project_id, $user_id, ProjectMember $projectMember)
    {
        return $projectMember->create([
            'project_id' => $project_id,
            'user_id'    => $user_id
        ]);
    }

    public function removeMember($id, ProjectMember $projectMember)
    {
        try {
            $projectMember->find($id)->delete();
            return ['success'=>true, "Membro excluído com sucesso!"];
        } catch (ModelNotFoundException $e) {
            return ['error'=>true, 'Membro não encontrado.'];
        } catch (\Exception $e) {
            return ['error'=>true, 'Ocorreu algum erro ao excluir o membro.'];
        }
    }

    public function isOwner($projectId, $ownerId)
    {
        if (count($this->projectRepository->findWhere(['id' => $projectId, 'owner_id' => $ownerId]))) {
            return true;
        }

        return false;
    }

    public function isMember($projectId, $userId)
    {
        $project = $this->projectRepository->find($projectId);

        foreach($project->project_members as $member) {
            if ($member->id == $userId) {
                return true;
            }
        }

        return false;
    }

    public function addFile(array $data, $id)
    {
        $project = $this->projectRepository->skipPresenter()->find($id);

        try {
            $this->projectFileValidator->with($data)->passesOrFail();

            $projectFile = $project->project_files()->create([
                'name' => $data['name'],
                'description' => $data['description'],
                'extension' => $data['file']->getClientOriginalExtension(),
                'project_id' => $id,
            ]);

            Storage::put($projectFile->id . '.' . $data['file']->getClientOriginalExtension(), File::get($data['file']));

            return $projectFile;

        } catch (ValidatorException $e) {

            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];

        }
    }

    public function removeFile($id, $fileId)
    {
        $project = $this->projectRepository->skipPresenter()->find($id);
        $file = $project->project_files()->find($fileId);

        Storage::delete($file->id . '.' . $file->extension);
        $project->project_files()->find($fileId)->destroy($fileId);

        return ['success' => 'Arquivo deletado com sucesso.'];
    }

}