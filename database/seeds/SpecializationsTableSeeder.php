<?php

use Illuminate\Database\Seeder;

class SpecializationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specializations')->insert([
            'name' => 'Doctor',
            'updated_at' => \Carbon\Carbon::now(),
            'created_at' => \Carbon\Carbon::now(),
        ]);
    }
}
