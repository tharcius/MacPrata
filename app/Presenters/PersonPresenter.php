<?php

namespace MacPrata\Presenters;

use MacPrata\Transformers\PersonTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PersonPresenter
 *
 * @package namespace MacPrata\Presenters;
 */
class PersonPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PersonTransformer();
    }
}
