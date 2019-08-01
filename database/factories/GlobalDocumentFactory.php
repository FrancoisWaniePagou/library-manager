<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\GlobalDocument;
use Faker\Generator as Faker;

$factory->define(GlobalDocument::class, function (Faker $faker) {
    return [
        'price' => $faker->randomNumber(3),
        'title' => $faker->title,
        'image' => $faker->image(),
        'documentType' => $faker->word,
    ];
});
