<?php

use Illuminate\Database\Seeder;

class ProjectTaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \FRD\Entities\ProjectTask::truncate();
        factory(\FRD\Entities\ProjectTask::class, 50)->create();
    }
}
