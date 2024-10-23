<?php

namespace Database\Seeders;

use App\Models\Leave;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LeaveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Leave::Create([
            'user_id' => 1,
            'created_by' => 1,
            'company_id'=>1,
            'leave_type_id' => 1,
            'start_date' => "2024-12-12",
            'end_date' => "2024-12-13",
            'total_days' => 1
        ]);
    }
}
