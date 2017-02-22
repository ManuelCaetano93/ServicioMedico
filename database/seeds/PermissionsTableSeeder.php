<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Example:
        // DB::table('tableName')->insert([
        //    'name' => 'entryName',
        //    'created_at' => \Carbon\Carbon::now(),
        //    'updated_at' => \Carbon\Carbon::now(),
        // ]);

        // Create User (CRUD) (count = 3) (Total = 3)

        DB::table('permissions')->insert([
            'name' => 'CreateUser',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('permissions')->insert([
            'name' => 'EditUser',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('permissions')->insert([
            'name' => 'DestroyUser',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        // Patient (CRUD) (Count = 3) (Total = 6)

        DB::table('permissions')->insert([
            'name' => 'CreatePatient',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
         ]);


        DB::table('permissions')->insert([
            'name' => 'EditPatient',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
         ]);


        DB::table('permissions')->insert([
            'name' => 'DestroyPatient',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        // Staff Creation (CRUD)

        DB::table('permissions')->insert([
            'name' => 'CreateStaff',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('permissions')->insert([
            'name' => 'EditStaff',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('permissions')->insert([
            'name' => 'DestroyStaff',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        // Set Appointment and Appointment(CRUD)

        DB::table('permissions')->insert([
            'name' => 'CreateAppointment',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('permissions')->insert([
            'name' => 'UpdateAppointment',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('permissions')->insert([
            'name' => 'DestroyAppointment',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        // Prescription (CRUD)

        DB::table('permissions')->insert([
            'name' => 'CreatePrescription',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('permissions')->insert([
            'name' => 'UpdatePrescription',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('permissions')->insert([
            'name' => 'DestroyPrescription',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        // Appointment Calendar

        DB::table('permissions')->insert([
            'name' => 'BlockDate',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('permissions')->insert([
            'name' => 'OpenDate',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('permissions')->insert([
            'name' => 'ViewDate',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        // Drug (CRUD)

        DB::table('permissions')->insert([
            'name' => 'CreateDrug',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('permissions')->insert([
            'name' => 'EditDrug',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('permissions')->insert([
            'name' => 'DestroyDrug',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        // Change Roles

        DB::table('permissions')->insert([
            'name' => 'AssignRole',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('permissions')->insert([
            'name' => 'AssignEspecialization',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
    }
}
