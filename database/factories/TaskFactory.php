<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Task;
use Faker\Generator as Faker;
use Faker\Provider\DateTime;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'project_id' => function() {
            return factory(Project::class)->create()->id;
        },
        'name' => $faker->name,
        'completed_at' => $faker->dateTime,
        'started_at' => $faker->dateTime,
        'deadline' => $faker->dateTime
    ];
});
