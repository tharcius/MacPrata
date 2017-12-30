<?php

use Faker\Generator as Faker;

$factory->define(MacPrata\Entities\Product::class, function (Faker $faker) {
    $unities = ['un','h', 'kg', 'm', 'm²', 'pç'];
    $types = ['product', 'service'];
        return [
            'name' => $faker->word(),
            'unity' =>  array_random($unities),
            'value' => rand(0,550) .".".rand(1,99),
            'type' => array_random($types)
        ];
});
