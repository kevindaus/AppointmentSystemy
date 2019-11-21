<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Staff;
use Faker\Generator as Faker;

$factory->define(Staff::class, function (Faker $faker) {
    return [
        'title'=>$faker->title,
        'first_name'=>$faker->firstName,
        'middle_name'=>$faker->lastName,
        'last_name'=>$faker->lastName,
        'phone_number'=>$faker->phoneNumber
    ];
});
