<?php

use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            'title' => 'present',
        ]);
        DB::table('statuses')->insert([
            'title' => 'absent',
        ]);
        DB::table('statuses')->insert([
            'title' => 'sick leave',
        ]);
        DB::table('statuses')->insert([
            'title' => 'day off',
        ]);
    }
}
