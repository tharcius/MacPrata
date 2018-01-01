<?php

namespace MacPrata\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Order extends Model implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
		'date',
		'total',
		'obs',
		'person_id',
		'equipment_id',
	];

    public function person(){
        return $this->belongsTo(Person::class);
    }

    public function equipment(){
        return $this->belongsTo(Equipment::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product');
    }

}
