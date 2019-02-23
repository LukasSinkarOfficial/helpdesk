<?php

use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            'name' => 'employee',
            'email' => 'employee@example.com',
            'password' => bcrypt('employee123')
        ]);
    }
}
