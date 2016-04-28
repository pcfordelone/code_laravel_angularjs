<?php

use Illuminate\Database\Seeder;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \FRD\Entities\Project::truncate();
        factory(\FRD\Entities\Project::class, 10)->create();
    }
}
