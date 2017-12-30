<?php

namespace MacPrata\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use MacPrata\Repositories\EquipmentRepository;
use MacPrata\Entities\Equipment;
use MacPrata\Validators\EquipmentValidator;

/**
 * Class EquipmentRepositoryEloquent
 * @package namespace MacPrata\Repositories;
 */
class EquipmentRepositoryEloquent extends BaseRepository implements EquipmentRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Equipment::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return EquipmentValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
