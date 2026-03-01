<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\User;
use App\Models\Character;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $projects = Project::factory(10)->create();
        
        $characters = Character::factory(30)->create();

        foreach ($projects as $project) {
            
            $project->characters()->attach(
                $characters->random(3)->pluck('id')->toArray()
            );
        }
    }
}

