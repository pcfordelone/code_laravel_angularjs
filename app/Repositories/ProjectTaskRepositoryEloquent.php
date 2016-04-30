<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 22/04/16
 * Time: 12:41
 */

namespace FRD\Repositories;

use FRD\Entities\ProjectTask;
use Prettus\Repository\Eloquent\BaseRepository;

class ProjectTaskRepositoryEloquent extends BaseRepository implements ProjectTaskRepositoryInterface
{

    public function model()
    {
        return ProjectTask::class;
    }

}