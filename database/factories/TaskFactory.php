<?php

use App\Models\Task;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'title'       => $faker->sentence(),
        'description' => $faker->text(),
        'creator_id'  => create(\App\Models\User::class)->id,
        'user_id'     => create(\App\Models\User::class)->id,
        'type'        => $faker->randomElement(array_keys(config('enums.tasks.types'))),
        'status'      => $faker->randomElement(array_keys(config('enums.tasks.statuses'))),
        'importance'  => $faker->randomElement(array_keys(config('enums.tasks.importance'))),
        'date_to'     => $faker->dateTimeBetween('-1 week', '+1 week')
    ];
});
