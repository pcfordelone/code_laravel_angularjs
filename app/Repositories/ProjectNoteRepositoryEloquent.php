<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 22/04/16
 * Time: 12:41
 */

namespace FRD\Repositories;

use FRD\Entities\ProjectNote;
use Prettus\Repository\Eloquent\BaseRepository;
use FRD\Presenters\ProjectNotePresenter;

class ProjectNoteRepositoryEloquent extends BaseRepository implements ProjectNoteRepositoryInterface
{

    public function model()
    {
        return ProjectNote::class;
    }

    public function presenter()
    {
        return ProjectNotePresenter::class;
    }

}