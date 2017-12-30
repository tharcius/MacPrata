<?php

use Faker\Generator as Faker;

$factory->define(MacPrata\Entities\Person::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'phone' => $faker->phoneNumber(),
        'email' => $faker->email()
    ];
});
