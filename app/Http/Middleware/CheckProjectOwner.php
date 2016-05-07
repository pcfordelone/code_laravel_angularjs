<?php

namespace FRD\Http\Middleware;

use Closure;
use FRD\Services\ProjectService;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class CheckProjectOwner
{
    private $projectService;

    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $userID = Authorizer::getResourceOwnerId();
        $projectId = $request->project;

        if (!$this->projectService->isOwner($projectId, $userID)) {
            return ['Error' => 'Access forbidden'];
            //return $this->projectService->find($projectId);
        }

        return $next($request);
    }
}
