<?php

use Illuminate\Database\Seeder;

class ProjectNoteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \FRD\Entities\ProjectNote::truncate();
        factory(\FRD\Entities\ProjectNote::class, 50)->create();
    }
}
