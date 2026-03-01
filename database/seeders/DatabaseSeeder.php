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
        Project::factory(10)->create();

        Character::factory(30)->create();
    }
}
