<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Administrador',
            'password' => bcrypt('123123'),
            'email' => 'admin@admin.admin',
            'surname' => 'Sistema',
            'identification' => '123123',
            'birthdate' => '12313',
            'sex' => 'male',
            'phoneNumber' => '123123',
            'cellphoneNumber' => '123123',
            'residence' => 'Caracas',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
    }
}
