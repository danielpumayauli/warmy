<?php

use Illuminate\Database\Seeder;
use App\Circle;
use App\Project;
use App\User;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $projects = factory(Project::class, 8)->create();

        // $projects->each(function($c){
        //     $count = rand(1, 3);
        //     $users = factory(User::class, $count)->create(); // Se crean en BD  users
        //     $c->users()->saveMany($users);
        // });
        
        // $projects = factory(Project::class, 8)->create()->each(function(Project $project){
        //     $project->circles()->attach([
        //         2,
        //         3,
        //     ]);
        //     $project->users()->attach([
        //         4,
        //         5,
        //     ]);
        // }); 



        // $circles = Circle::all();

    }
}
