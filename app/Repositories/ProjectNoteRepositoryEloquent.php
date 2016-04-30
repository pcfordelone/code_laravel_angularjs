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

class ProjectNoteRepositoryEloquent extends BaseRepository implements ProjectNoteRepositoryInterface
{

    public function model()
    {
        return ProjectNote::class;
    }

}