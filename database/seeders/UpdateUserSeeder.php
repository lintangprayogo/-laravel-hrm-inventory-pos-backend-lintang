<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UpdateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = User::find(1);
        $user->department_id = 1;
        $user->designation_id = 1;
        $user->shift_id = 1;
        $user->save();

        $user = User::find(2);
        $user->department_id = 2;
        $user->designation_id = 2;
        $user->shift_id = 1;
        $user->save();
    }
}
