<?php

use Illuminate\Database\Seeder;

class RecordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('records')->insert([

            'name' => 'required|max:255',
            'description' => 'required|max:400',
            'suffering' => 'required',
            'doctor' => 'required',
            'pretreatments' => 'required|max:255',
            'medicines' => 'required|max:255',
            'status' => 'required',
        ]);

    }
}
