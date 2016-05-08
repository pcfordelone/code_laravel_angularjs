<?php

namespace FRD\Http\Controllers;

use FRD\Services\ProjectService;
use Illuminate\Http\Request;
use FRD\Http\Requests;


class ProjectFileController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ProjectService $projectService, $id)
    {
        return $projectService->addFile($request->all(), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectService $projectService, $id, $fileId)
    {
        return $projectService->removeFile($id, $fileId);
    }

}
