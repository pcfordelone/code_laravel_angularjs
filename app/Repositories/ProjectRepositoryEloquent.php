<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 22/04/16
 * Time: 12:41
 */

namespace FRD\Repositories;

use FRD\Entities\Project;
use Prettus\Repository\Eloquent\BaseRepository;
use FRD\Presenters\ProjectPresenter;

class ProjectRepositoryEloquent extends BaseRepository implements ProjectRepositoryInterface
{

    public function model()
    {
        return Project::class;
    }

    public function presenter()
    {
        return ProjectPresenter::class;
    }

}