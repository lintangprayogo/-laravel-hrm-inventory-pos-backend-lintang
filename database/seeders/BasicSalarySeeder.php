<?php

namespace Database\Seeders;

use App\Models\BasicSalary;
use Illuminate\Database\Seeder;

class BasicSalarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BasicSalary::create(
            [
                "user_id" => 1,
                "company_id" => 1,
                'basic_salary' => 5000000.00,
            ]
        );
        BasicSalary::create(
            [
                'user_id' => 2,
                'company_id' => 1,
                'basic_salary' => 6000000.00,
            ]
        );
    }
}
