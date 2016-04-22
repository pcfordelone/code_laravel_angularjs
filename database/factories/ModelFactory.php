<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(FRD\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(FRD\Models\Client\Client::class, function (Faker\Generator $faker) {
    return [
        'name'          => $faker->name,
        'type'          => $faker->boolean(50),
        'responsible'   => $faker->name,
        'email'         => $faker->safeEmail,
        'adress'        => $faker->address,
        'phone'         => $faker->phoneNumber,
        'obs'           => $faker->sentence()
    ];
});