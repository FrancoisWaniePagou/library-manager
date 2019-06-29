<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Library;
use Faker\Generator as Faker;

$factory->define(Library::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'owner' => $faker->name,
        'phoneNumber' => $faker->phoneNumber,
        'city' => $faker->city,
        'quarter' => $faker->streetName
    ];
});
