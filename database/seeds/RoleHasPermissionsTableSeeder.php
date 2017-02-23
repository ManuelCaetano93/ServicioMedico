<?php

use Illuminate\Database\Seeder;

class RoleHasPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create User (CRUD)

        DB::table('role_has_permissions')->insert([
            'role_id' => 1,
            'permission_id' => 1,
        ]); // CreateUser
        DB::table('role_has_permissions')->insert([
            'role_id' => 1,
            'permission_id' => 2,
        ]); // EditUser
        DB::table('role_has_permissions')->insert([
            'role_id' => 1,
            'permission_id' => 3,
        ]); // DestroyUser

        // Patient (CRUD)

        DB::table('role_has_permissions')->insert([
            'role_id' => 1,
            'permission_id' => 4,
        ]); // CreatePatient
        DB::table('role_has_permissions')->insert([
            'role_id' => 1,
            'permission_id' => 5,
        ]); // EditPatient
        DB::table('role_has_permissions')->insert([
            'role_id' => 1,
            'permission_id' => 6,
        ]); // DestroyPatient

        // Staff Creation (CRUD)

        DB::table('role_has_permissions')->insert([
            'role_id' => 1,
            'permission_id' => 7,
        ]); // CreateStaff
        DB::table('role_has_permissions')->insert([
            'role_id' => 1,
            'permission_id' => 8,
        ]); // EditStaff
        DB::table('role_has_permissions')->insert([
            'role_id' => 1,
            'permission_id' => 9,
        ]); // DestroyStaff

        // Set Appointment and Appointment(CRUD)


        DB::table('role_has_permissions')->insert([
            'role_id' => 1,
            'permission_id' => 10,
        ]); // CreateAppointment
        DB::table('role_has_permissions')->insert([
            'role_id' => 1,
            'permission_id' => 11,
        ]); // UpdateAppointment
        DB::table('role_has_permissions')->insert([
            'role_id' => 1,
            'permission_id' => 12,
        ]); // DestroyAppointment

        // Prescription (CRUD)

        DB::table('role_has_permissions')->insert([
            'role_id' => 1,
            'permission_id' => 13,
        ]); // CreatePrescription
        DB::table('role_has_permissions')->insert([
            'role_id' => 1,
            'permission_id' => 14,
        ]); // UpdatePrescription
        DB::table('role_has_permissions')->insert([
            'role_id' => 1,
            'permission_id' => 15,
        ]); // DestroyPrescription

        // Appointment Calendar (CRUD)

        DB::table('role_has_permissions')->insert([
            'role_id' => 1,
            'permission_id' => 16,
        ]); // BlockDate
        DB::table('role_has_permissions')->insert([
            'role_id' => 1,
            'permission_id' => 17,
        ]); // OpenDate
        DB::table('role_has_permissions')->insert([
            'role_id' => 1,
            'permission_id' => 18,
        ]); // ViewDate

        // Drug (CRUD)

        DB::table('role_has_permissions')->insert([
            'role_id' => 1,
            'permission_id' => 19,
        ]); // CreateDrug
        DB::table('role_has_permissions')->insert([
            'role_id' => 1,
            'permission_id' => 20,
        ]); // EditDrug
        DB::table('role_has_permissions')->insert([
            'role_id' => 1,
            'permission_id' => 21,
        ]); // DestroyDrug

        // Change Roles (CRUD)

        DB::table('role_has_permissions')->insert([
            'role_id' => 1,
            'permission_id' => 22,
        ]); // AssignRole
        DB::table('role_has_permissions')->insert([
            'role_id' => 1,
            'permission_id' => 23,
        ]); // AssignEspecialization


    }
}
