<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Project;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Daniel',
            'lastName' => 'Pumayauli',
            'birthDate' => '1992-01-06',
            'career' => 'Ingeniería de Sistemas',
            'lookingFor' => 'Colaboradores',
            'country' => 'Perú',
            'gender' => 'male',            
            'email' => 'danielpumayauli@gmail.com',
            'password' => bcrypt('123456'),
            'acceptance' => 'Acepto',
            'image' => 'https://lorempixel.com/800/800/people/?78759',

        ]);
        //$users = factory(User::class, 40)->create(); // Se crean en BD  usuarios

        // $users = factory(User::class, 40)->create()->each(function(User $user){
        //     $user->projects()->attach([
        //         3,
        //         6,
        //     ]);
        // }); 
        
    }
}
