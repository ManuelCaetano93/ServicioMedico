<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
		$this->call(RoleHasPermissionsTableSeeder::class);
		$this->call(UserHasRoleTableSeeder::class);
		$this->call(SpecializationsTableSeeder::class);
		$this->call(SpecializationsUserTableSeeder::class);
		$this->call(RecordsTableSeeder::class);
    }
}
