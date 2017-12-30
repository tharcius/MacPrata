<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Equipment;

/**
 * Class EquipmentTransformer
 * @package namespace App\Transformers;
 */
class EquipmentTransformer extends TransformerAbstract
{

    /**
     * Transform the Equipment entity
     * @param App\Entities\Equipment $model
     *
     * @return array
     */
    public function transform(Equipment $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
