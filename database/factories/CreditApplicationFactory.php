<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\CreditApplication::class, function (Faker $faker) {
    return [
        "customer_id" => factory(\App\Customer::class)->create()->id,
        "application_status" => 'pending',
        "basis" => $faker->word,
        "terms" => $faker->word,
        "options" => $faker->word,
        "due_date" => $faker->date("Y-m-d"),
        "request_due_date" => $faker->date("Y-m-d"),
        "adp" => $faker->randomNumber(5),
        "adp_ma" => $faker->randomNumber(5),
        "adp_rebate" => $faker->randomNumber(5),
        "adp_net" => $faker->randomNumber(5),
        "dp" => $faker->randomNumber(5),
        "dp_ma" => $faker->randomNumber(5),
        "dp_cropping" => $faker->randomNumber(5),
        "dp_rebate" => $faker->randomNumber(5),
        "dp_net" => $faker->randomNumber(5),
        "status_of_customer" => 'new',
        "time_interviewed" => $faker->time('H:i:s'),
        "time_walked_in" => $faker->time('H:i:s'),
        "name_of_referral" => $faker->name,
        "date_received_by_ci" => $faker->date("Y-m-d"),
        "time_received_by_ci" => $faker->time('H:i:s'),
        "map_location_longitude" => $faker->longitude,
        "map_location_latitude" => $faker->latitude,
        "distance_from_office" => $faker->randomNumber(2) . ' km',
        "time_away_from_office" => $faker->randomNumber(2) . ' minutes',
        "processing_time" => $faker->randomNumber(2) . ' minutes',
        "estimated_time_to_release" => $faker->randomNumber(2) . ' days',
        "recommendation_of_branch_manager" => $faker->paragraph,
    ];
});
