<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class EmployeeTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('employees')->insert(
            [
                'full_name' => "Nimal De Silva",
                'initials' => 'N',
                'last_name' => "De Silva",
                'Designation' => 'Teacher',
                'date_joined' => '2016-02-01',
                'primary_address' => 'no1, Galle road',
                'secondary_address' => 'no2, Galle road',
                'primary_contact' => '011-2729729',
                'secondary_contact' => '011-2729728'
            ]
            );
    }
}
