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

            'name' => 'Record 1',
            'description' => 'descripcion',
            'suffering' => 'padecimiento x',
            'id_doctor' => '2',
            'pretreatments' => 'tratamientos anteriores xx1',
            'medicines' => 'Atamel',
            'status' => 'activo',
            'id_user' => '1',
        ]);

    }
}
