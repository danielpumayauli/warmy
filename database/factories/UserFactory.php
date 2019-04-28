<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    $gender = $faker->randomElement(['male', 'female']);
    $career = $faker->randomElement(['Administración de Empresas',
                                    'Contabilidad',
                                    'Ingeniería Empresarial',
                                    'Ingeniería de Sistemas',
                                    'Marketing']);
    $lookingFor = $faker->randomElement(['Socios',
                                        'Oportunidades Laborales',
                                        'Colaboradores',
                                        'Apoyo',
                                        'Mentores']);
    return [
        'name' => $faker->firstName($gender),
        'lastName' => $faker->lastName,
        'birthDate' => $faker->date($format = 'Y-m-d', $max = '1995-01-06'),
        'career' => $career,
        'lookingFor' => $lookingFor,
        'country' => $faker->country,
        'gender' => $gender,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        // 'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'password' => bcrypt('123456'),
        'acceptance' => 'Acepto',
        'image' => $faker->imageUrl(800, 800, 'people'),
        'remember_token' => str_random(10),
    ];
});
