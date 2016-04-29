<?php

namespace FRD\Http\Controllers;

use FRD\Repositories\ProjectRepositoryInterface;
use FRD\Services\ProjectService;
use Illuminate\Http\Request;

use FRD\Http\Requests;
use FRD\Http\Controllers\Controller;

class ProjectController extends Controller
{
    private $projectRepository;
    private $projectService;

    public function __construct(ProjectRepositoryInterface $projectRepositoryInterface, ProjectService $projectService)
    {
        $this->projectRepository = $projectRepositoryInterface;
        $this->projectService = $projectService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->projectRepository->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->projectService->store($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->projectRepository->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $this->projectService->update($request->all(), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = $this->projectRepository->find($id);
        $this->projectRepository->delete($id);

        return response()->json(["msg" => "O cliente {$project->name} foi excluído com sucesso"]);
    }
}
