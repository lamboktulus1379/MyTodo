<?php

namespace Database\Seeders;

use App\Models\Section;
use App\Models\Task;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Section::factory()
            ->times(3)
            ->hasTasks(10)
            ->create();
    }
}
