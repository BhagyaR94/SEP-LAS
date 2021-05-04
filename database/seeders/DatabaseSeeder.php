<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employee')->insert([
            'full_name'=> 'Admin',
            'initials' => 'A',
            'last_name' => 'Admin',
            'designation' => 'Administrator',
            'date_joined' => '2020-01-01',
            'primary_address' => 'Primary Address',
            'secondary_address' => 'Secondary Address',
            'primary_contact' => '0112796798',
            'secondary_contact' => '0112796798',
            'user_name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => 'admin',
            'user_type' => '2',
        ]);
    }
}
