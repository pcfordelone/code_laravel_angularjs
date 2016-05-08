<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OAuthClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('oauth_clients')->delete();

        DB::table('oauth_clients')->insert([
            'id'         => 'ye3IbA3x8s',
            'secret'     => 'XEdWdELvU5',
            'name'       => 'FRDProjectManager',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);
    }
}
