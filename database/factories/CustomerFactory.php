<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Customer::class, function (Faker $faker) {
    return [
        "title" => $faker->word,
        "first_name" => $faker->firstName,
        "middle_name" => $faker->lastName,
        "last_name" => $faker->lastName,
        "suffix" => $faker->word,
        "birthday" => date("Y-m-d"),
        "facebook_account" => $faker->word,
        "civil_status" => 'single',
        "wedding_anniversary" => date("Y-m-d"),
        "house_number" => $faker->word,
        "street" => $faker->word,
        "barangay" => $faker->word,
        "municipality" => $faker->word,
        "province" => $faker->word,
        "zipcode" => $faker->word,
        "length_of_stay_present_address" => $faker->word,
        "previous_address" => $faker->word,
        "birth_place" => $faker->word,
        "fathers_name" => $faker->name('male'),
        "mothers_name" => $faker->name('female'),
        "gender" => $faker->word,
        "height" => $faker->word,
        "weight" => $faker->word,
        "tin_id" => $faker->word,
        "house_ownership" => $faker->word,
        "business_address" => $faker->word,
        "mobile_number" => $faker->phoneNumber,
        "occupation" => $faker->word,
        "length_of_service" => $faker->randomNumber(1),
        "basic_income" => $faker->randomNumber(4),
        "source_of_income" => $faker->word,
        "other_income" => $faker->word,
        "name_of_spouse" => $faker->word,
        "age" => $faker->randomNumber(2),
        "number_of_children" => $faker->randomNumber(2),
        "spouse_contact_number" => $faker->phoneNumber,
        "spouse_occupation" => $faker->word
    ];
});
