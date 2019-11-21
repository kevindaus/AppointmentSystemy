<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Product::class, function (Faker $faker) {
    return [
        'name'=>$faker->word,
        'description'=>$faker->word,
        'type'=>'Big Bike',
        'picture'=>'Sketchpad.png',
        'price'=>$faker->randomNumber(5),
        'specification'=>$faker->paragraph,
    ];
});
