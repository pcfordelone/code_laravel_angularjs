<?php

namespace FRD\Services;


use FRD\Repositories\ClientRepositoryInterface;
use FRD\Validators\ClientValidator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
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

    public function find($id)
    {
        try {
            return $this->clientRepository->with('projects')->find($id);
        } catch (ModelNotFoundException $e) {
            return ['error'=>true, 'Cliente não encontrado.'];
        } catch (\Exception $e) {
            return ['error' => true, 'Ocorreu algum erro ao procurar o cliente.'];
        }
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

        } catch (ModelNotFoundException $e) {
            return ['error'=>true, 'Cliente não encontrado.'];
        } catch (ValidatorException $e) {
            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];

        }
    }

    public function destroy($id)
    {
        $client = $this->find($id);

        try {
            $this->clientRepository->find($id)->delete();
            return ['success'=>true, "Cliente {$client->name} deletado com sucesso!"];
        } catch (QueryException $e) {
            return ['error'=>true, 'Cliente não pode ser apagado pois existe um ou mais projetos vinculados a ele.'];
        } catch (ModelNotFoundException $e) {
            return ['error'=>true, 'Cliente não encontrado.'];
        } catch (\Exception $e) {
            return ['error'=>true, 'Ocorreu algum erro ao excluir o cliente.'];
        }
    }
}