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
        \FRD\Models\Client\Client::truncate();
        factory(\FRD\Models\Client\Client::class, 10)->create();
    }
}
