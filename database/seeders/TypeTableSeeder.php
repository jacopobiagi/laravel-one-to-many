<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Type;
use App\Models\Project;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type:: factory()
            -> count(100)
            -> make()
            -> each(function($type){

                $project = Project:: inRandomOrder() -> first();
                $type -> project() -> associate($project);
                $type -> save();
            });

    }
}
