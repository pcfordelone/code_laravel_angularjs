<?php

use Illuminate\Database\Seeder;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \FRD\Entities\Client::truncate();
        factory(\FRD\Entities\Client::class, 10)->create();
    }
}
