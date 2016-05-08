<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 08/05/16
 * Time: 11:08
 */

namespace FRD\Presenters;

use FRD\Transformers\ProjectMemberTransformer;
use FRD\Transformers\ProjectTaskTransformer;
use Prettus\Repository\Presenter\FractalPresenter;


class ProjectTaskPresenter extends FractalPresenter
{

    public function getTransformer()
    {
        return new ProjectTaskTransformer();
    }

}