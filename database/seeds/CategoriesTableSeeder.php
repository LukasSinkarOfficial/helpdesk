<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Content management system problem',
        ]);

        DB::table('categories')->insert([
            'name' => 'Website repairs',
        ]);

        DB::table('categories')->insert([
            'name' => 'Help using content management system',
        ]);

        DB::table('categories')->insert([
            'name' => 'Implementing new features',
        ]);
    }
}
