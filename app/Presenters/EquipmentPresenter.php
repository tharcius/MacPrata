<?php

namespace App\Presenters;

use App\Transformers\EquipmentTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class EquipmentPresenter
 *
 * @package namespace App\Presenters;
 */
class EquipmentPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new EquipmentTransformer();
    }
}
