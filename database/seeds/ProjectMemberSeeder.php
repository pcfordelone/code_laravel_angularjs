<?php

use Illuminate\Database\Seeder;

class ProjectMemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \FRD\Entities\ProjectMember::truncate();
        factory(\FRD\Entities\ProjectMember::class, 10)->create();
    }
}
