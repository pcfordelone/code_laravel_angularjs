<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 08/05/16
 * Time: 11:08
 */

namespace FRD\Presenters;

use FRD\Transformers\ClientTransformer;
use Prettus\Repository\Presenter\FractalPresenter;


class ClientPresenter extends FractalPresenter
{

    public function getTransformer()
    {
        return new ClientTransformer();
    }

}