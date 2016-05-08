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

        factory(\FRD\Entities\User::class)->create([
            'name' => 'Paulo Cesar Fordelone',
            'email' => 'pc@fordelone.com.br',
            'password' => bcrypt(123456),
            'remember_token' => str_random(10),
        ]);

        factory(\FRD\Entities\User::class, 10)->create();
    }
}
