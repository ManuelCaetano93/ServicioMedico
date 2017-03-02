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
            'surname' => 'Sistema',
            'identification' => '123123',
            'birthday' => '12313',
            'sex' => 'male',
            'phone' => '123123',
            'cellphone' => '123123',
            'residence' => 'Caracas',
            'email' => 'admin@admin.admin',
            'password' => bcrypt('123123'),
            'updated_at' => \Carbon\Carbon::now(),
            'created_at' => \Carbon\Carbon::now(),
        ]);

        // Not On Final Release

        DB::table('users')->insert([
            'name' => 'Doctol',
            'surname' => 'Ramirez',
            'identification' => '122233',
            'birthday' => '12313',
            'sex' => 'male',
            'phone' => '123123',
            'cellphone' => '123123',
            'residence' => 'Caracas',
            'email' => 'DoctolRamirez@gmail.com',
            'password' => bcrypt('123123'),
            'updated_at' => \Carbon\Carbon::now(),
            'created_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Farmaceuta',
            'surname' => 'Perez',
            'identification' => '22211',
            'birthday' => '12313',
            'sex' => 'female',
            'phone' => '123123',
            'cellphone' => '123123',
            'residence' => 'Caracas',
            'email' => 'FarmaceutaPerez@gmail.com',
            'password' => bcrypt('123123'),
            'updated_at' => \Carbon\Carbon::now(),
            'created_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Secretaria',
            'surname' => 'Fernandez',
            'identification' => '22211',
            'birthday' => '12313',
            'sex' => 'female',
            'phone' => '123123',
            'cellphone' => '123123',
            'residence' => 'Caracas',
            'email' => 'SecretariaFernandez@gmail.com',
            'password' => bcrypt('123123'),
            'updated_at' => \Carbon\Carbon::now(),
            'created_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Paciente',
            'surname' => 'Rodriguez',
            'identification' => '22211',
            'birthday' => '12313',
            'sex' => 'female',
            'phone' => '123123',
            'cellphone' => '123123',
            'residence' => 'Caracas',
            'email' => 'PacienteRodriguez@gmail.com',
            'password' => bcrypt('123123'),
            'updated_at' => \Carbon\Carbon::now(),
            'created_at' => \Carbon\Carbon::now(),
        ]);
    }
}
