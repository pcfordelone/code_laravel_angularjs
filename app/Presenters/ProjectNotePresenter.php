<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 08/05/16
 * Time: 11:08
 */

namespace FRD\Presenters;

use FRD\Transformers\ProjectNoteTransformer;
use Prettus\Repository\Presenter\FractalPresenter;


class ProjectNotePresenter extends FractalPresenter
{

    public function getTransformer()
    {
        return new ProjectNoteTransformer();
    }

}