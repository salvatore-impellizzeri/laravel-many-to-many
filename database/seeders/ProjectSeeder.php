<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\Project;
use App\Models\Type;

// Helpers
use Illuminate\Support\Facades\Schema;


class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            Project::truncate();
        });
        
        for($i = 0; $i < 10; $i++) {
            $randomType = null;
            if(rand(0,1)){
                $randomType = Type::inRandomOrder()->first();
                $randomTypeId = $randomType->id;
            }

            Project::create([
                'title' => fake()->sentence(),
                'description'=> fake()->paragraph(),
                'src'=> fake()->imageUrl(),
                'visible'=> fake()->boolean(70),
                'type_id'=> $randomTypeId,
            ]);
        }
    }
}
