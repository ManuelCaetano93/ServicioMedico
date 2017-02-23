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
            'phoneNumber' => '123123',
            'cellphoneNumber' => '123123',
            'residence' => 'Caracas',
            'email' => 'admin@admin.admin',
            'password' => bcrypt('123123'),
            'updated_at' => \Carbon\Carbon::now(),
            'created_at' => \Carbon\Carbon::now(),

        ]);
    }
}
