<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \FRD\Entities\User::truncate();
        factory(\FRD\Entities\User::class, 10)->create();
    }
}
