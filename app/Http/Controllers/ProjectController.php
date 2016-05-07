<?php

namespace FRD\Http\Controllers;

use FRD\Repositories\ProjectRepositoryInterface;
use FRD\Services\ProjectService;
use Illuminate\Http\Request;

use FRD\Http\Requests;
use FRD\Http\Controllers\Controller;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

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
        return $this->projectRepository->with(['owner','client'])->findWhere(['owner_id' => Authorizer::getResourceOwnerId()]);
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
        if (!$this->checkPermissions($id)) {
            return ['Error' => 'Access forbidden'];
        }

        return $this->projectService->find($id);

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
        if (!$this->checkProjectOwner($id)) {
            return ['Error' => 'Access forbidden'];
        }

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
        if (!$this->checkProjectOwner($id)) {
            return ['Error' => 'Access forbidden'];
        }

        return $this->projectService->destroy($id);
    }

    public function members($id)
    {
        return $this->projectService->find($id)->project_members;
    }

    private function checkProjectOwner($projectId)
    {
        $userID = Authorizer::getResourceOwnerId();

        if (!$this->projectService->isOwner($projectId, $userID)) {
            return false;
        }

        return true;
    }

    private function checkProjectMember($projectId)
    {
        $userID = Authorizer::getResourceOwnerId();

        if (!$this->projectService->isMember($projectId, $userID)) {
            return false;
        }

        return true;
    }

    public function checkPermissions($projectId)
    {
        if ($this->checkProjectOwner($projectId) or $this->checkProjectMember($projectId)) {
            return true;
        }

        return false;
    }

}
