<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\RadcheckProfile;
use Faker\Generator as Faker;

$factory->define(RadcheckProfile::class, function (Faker $faker) {
    return [
        'radcheck_id' => rand(4,7),
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'phone' => $faker->numberBetween(0, 6),
        'mobile' => $faker->numberBetween(0, 7),
        'email' => $faker->email,
        'gender' => array_rand(['male', 'female']),
        'address' => $faker->streetAddress,
        'city' => $faker->city,
        'notes' => $faker->sentence,

    ];
});
