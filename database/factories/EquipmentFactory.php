<?php

use Faker\Generator as Faker;
$factory->define(MacPrata\Entities\Equipment::class, function (Faker $faker) {
    return [
        'name' => $faker->word(),
        'manufacture' => $faker->company(),
        'model' => $faker->city(),
        'serial_number' => $faker->uuid(),
        'acessories' => $faker->sentence(rand(1,15)),
        'obs' => $faker->realText(rand(10,200))
    ];
});
