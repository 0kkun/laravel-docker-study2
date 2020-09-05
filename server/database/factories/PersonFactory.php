<?php

use Faker\Generator as Faker;
use App\Models\Person;
use Carbon\Carbon;

$factory->define(Person::class, function (Faker $faker) {
    $today = Carbon::now();
    return [
        'age'     => $faker->numberBetween(1,40),
        'name'  => $faker->userName,
        'created_at' => $today,
        'updated_at' => $today
    ];
});
