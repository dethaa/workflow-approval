<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('employees')->truncate();

        DB::table('employees')->insert([
            [
                'nik' => '201',
                'name' => 'Budi Santoso',
                'email' => 'budi@xyz.com',
                'position' => 'Staff',
                'approver1_nik' => '101',
                'approver1_name' => 'Siti Rahma',
                'approver1_email' => 'siti@xyz.com',
                'approver1_position' => 'Supervisor',
                'approver2_nik' => '301',
                'approver2_name' => 'Andi Wijaya',
                'approver2_email' => 'andi@xyz.com',
                'approver2_position' => 'Manager',
            ],
            [
                'nik' => '101',
                'name' => 'Siti Rahma',
                'email' => 'siti@xyz.com',
                'position' => 'Supervisor',
                'approver1_nik' => '301',
                'approver1_name' => 'Andi Wijaya',
                'approver1_email' => 'andi@xyz.com',
                'approver1_position' => 'Manager',
                'approver2_nik' => '401',
                'approver2_name' => 'Dewi Kusuma',
                'approver2_email' => 'dewi@xyz.com',
                'approver2_position' => 'Direktur Keuangan',
            ],
            [
                'nik' => '301',
                'name' => 'Andi Wijaya',
                'email' => 'andi@xyz.com',
                'position' => 'Manager',
                'approver1_nik' => '401',
                'approver1_name' => 'Dewi Kusuma',
                'approver1_email' => 'dewi@xyz.com',
                'approver1_position' => 'Direktur Keuangan',
                'approver2_nik' => null,
                'approver2_name' => null,
                'approver2_email' => null,
                'approver2_position' => null,
            ],
            [
                'nik' => '401',
                'name' => 'Dewi Kusuma',
                'email' => 'dewi@xyz.com',
                'position' => 'Direktur Keuangan',
                'approver1_nik' => null,
                'approver1_name' => null,
                'approver1_email' => null,
                'approver1_position' => null,
                'approver2_nik' => null,
                'approver2_name' => null,
                'approver2_email' => null,
                'approver2_position' => null,
            ],
        ]);
    }
}
