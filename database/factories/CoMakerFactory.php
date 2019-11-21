<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CoMaker;
use App\Model;
use Faker\Generator as Faker;

$factory->define(CoMaker::class, function (Faker $faker) {
    return [
        "title" => $faker->title,
        "first_name" => $faker->firstName,
        "middle_name" => $faker->lastName,
        "last_name" => $faker->lastName,
        "address" => $faker->address,
        "relationship" => 'guardian',
        "occupation" => $faker->word,
        "contact_number" => $faker->phoneNumber,
        "legal_document_presented" => $faker->word,
        "identification_number" => $faker->uuid,
        "drivers_license" => $faker->uuid,
        "first_signature_specimen" => $faker->word,
        "second_signature_specimen" => $faker->word,
        "third_signature_specimen" => $faker->word
    ];
});
