<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        \FRD\Models\Client\Client::truncate();
        factory(\FRD\Models\Client\Client::class, 10)->create();
        // $this->call(UserTableSeeder::class);

        Model::reguard();
    }
}
