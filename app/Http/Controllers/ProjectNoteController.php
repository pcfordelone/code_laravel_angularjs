<?php

namespace FRD\Http\Controllers;

use FRD\Repositories\ProjectNoteRepositoryInterface;
use FRD\Services\ProjectNoteService;
use Illuminate\Http\Request;
use FRD\Http\Requests;
use FRD\Http\Controllers\Controller;

class ProjectNoteController extends Controller
{
    private $projectNoteRepository;
    private $projectNoteService;

    public function __construct(ProjectNoteRepositoryInterface $projectNoteRepositoryInterface, ProjectNoteService $projectNoteService)
    {
        $this->projectNoteRepository = $projectNoteRepositoryInterface;
        $this->projectNoteService = $projectNoteService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return $this->projectNoteRepository->findWhere(['project_id' => $id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->projectNoteService->store($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $noteId)
    {
        return $this->projectNoteRepository->findWhere(['id' => $noteId]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $noteId)
    {
        return $this->projectNoteService->update($request->all(), $noteId);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $noteId)
    {
        $projectNote = $this->projectNoteRepository->find($noteId);
        $this->projectNoteRepository->delete($noteId);

        return response()->json(["msg" => "A nota {$projectNote->title} foi excluída com sucesso"]);
    }
}
