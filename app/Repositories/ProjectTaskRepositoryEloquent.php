<?php

namespace FRD\Repositories;

use FRD\Entities\ProjectTask;
use FRD\Presenters\ProjectTaskPresenter;
use Prettus\Repository\Eloquent\BaseRepository;

class ProjectTaskRepositoryEloquent extends BaseRepository implements ProjectTaskRepositoryInterface
{

    public function model()
    {
        return ProjectTask::class;
    }

    public function presenter()
    {
        return ProjectTaskPresenter::class;
    }
}