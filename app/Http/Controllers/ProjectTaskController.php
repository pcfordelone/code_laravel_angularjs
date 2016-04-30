<?php

namespace FRD\Http\Controllers;

use FRD\Repositories\ProjectNoteRepositoryInterface;
use FRD\Repositories\ProjectTaskRepositoryInterface;
use FRD\Services\ProjectNoteService;
use FRD\Services\ProjectTaskService;
use Illuminate\Http\Request;
use FRD\Http\Requests;
use FRD\Http\Controllers\Controller;

class ProjectTaskController extends Controller
{
    private $projectTaskRepository;
    private $projectTaskService;

    public function __construct(ProjectTaskRepositoryInterface $projectTaskRepositoryInterface, ProjectTaskService $projectTaskService)
    {
        $this->projectTaskRepository = $projectTaskRepositoryInterface;
        $this->projectTaskService = $projectTaskService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return $this->projectTaskRepository->findWhere(['project_id' => $id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->projectTaskService->store($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $taskId)
    {
        return $this->projectTaskRepository->findWhere(['id' => $taskId]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $taskId)
    {
        return $this->projectTaskService->update($request->all(), $taskId);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $taskId)
    {
        $projectTask = $this->projectTaskRepository->find($taskId);
        $this->projectTaskRepository->delete($taskId);

        return response()->json(["msg" => "A nota {$projectTask->name} foi excluída com sucesso"]);
    }
}
