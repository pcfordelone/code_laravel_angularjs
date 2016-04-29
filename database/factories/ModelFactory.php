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

$factory->define(FRD\Entities\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(FRD\Entities\Client::class, function (Faker\Generator $faker) {
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

$factory->define(FRD\Entities\Project::class, function (Faker\Generator $faker) {
    return [
        'name'          => $faker->name,
        'description'   => $faker->text(200),
        'progress'      => $faker->text(50),
        'status'        => $faker->text(50),
        'duo_date'      => $faker->date('Y-m-d'),
        'owner_id'       => $faker->numberBetween(1,10),
        'client_id'     => $faker->numberBetween(1,10),
    ];
});