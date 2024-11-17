<?php

namespace Database\Seeders;

use App\Models\Holiday;
use App\Models\Shift;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CompanySeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            PermissionSeeder::class,
            PermissionRoleSeeder::class,
            DepartmentSeeder::class,
            DesignationSeeder::class,
            ShiftSeeder::class,
            BasicSalarySeeder::class,
            RoleUserSeeder::class,
            HolidaySeeder::class,
            LeaveTypeSeeder::class,
            LeaveSeeder::class,
            AttendanceSeeder::class,
            PayrollSeeder::class,
            UpdateUserSeeder::class
        ]);
    }
}
