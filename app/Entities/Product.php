<?php

namespace MacPrata\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Product extends Model implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
		'name',
		'unity',
        'value',
        'type'
	];

}
