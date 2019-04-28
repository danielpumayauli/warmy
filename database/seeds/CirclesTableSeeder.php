<?php

use Illuminate\Database\Seeder;
use App\Circle;
use App\Project;
use App\User;

class CirclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Circle::create([
            'name' => 'Comercial',
            'description' => '',
            'image' => '',
            'shortName' => 'trade',
        ]);
        Circle::create([
            'name' => 'Laboral',
            'description' => '',
            'image' => '',
            'shortName' => 'work',
        ]);
        Circle::create([
            'name' => 'Social',
            'description' => '',
            'image' => '',
            'shortName' => 'social',
        ]);
        Circle::create([
            'name' => 'StartUp',
            'description' => '',
            'image' => '',
            'shortName' => 'startup',
        ]);

        $circles = Circle::all();

        $circles->each(function($c){
            $projects = factory(Project::class,rand(2,4))->create(); // entre 2 y 4 proyectos por cada circulo
            $c->projects()->saveMany($projects);

                $projects->each(function($p){
                    $count = rand(1, 3); // entre 1 y 3 usuarios por cada proyecto
                    $users = factory(User::class, $count)->create();
                    $p->users()->saveMany($users);
                });
        });
            

            

        
    }
}
