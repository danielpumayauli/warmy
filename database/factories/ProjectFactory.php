<?php

use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
    $name = substr($faker->unique()->sentence(4), 0 ,-1);
    return [
        'name' => $name,
        'description' => $faker->sentence(10),
        'image' => $faker->imageUrl(250, 250),
        'shortName' => str_slug($name,'-'),
    ];
});
