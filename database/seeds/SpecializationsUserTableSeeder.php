<?php

use Illuminate\Database\Seeder;

class SpecializationsUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specialization_user')->insert([
            'specialization_id'=>1,
            'user_id'=>1,
        ]);
    }
}
