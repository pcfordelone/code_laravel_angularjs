<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 22/04/16
 * Time: 12:41
 */

namespace FRD\Repositories;

use FRD\Entities\Client;
use FRD\Presenters\ClientPresenter;
use Prettus\Repository\Eloquent\BaseRepository;

class ClientRepositoryEloquent extends BaseRepository implements ClientRepositoryInterface
{

    public function model()
    {
        return Client::class;
    }

    public function presenter()
    {
        return ClientPresenter::class;
    }

}