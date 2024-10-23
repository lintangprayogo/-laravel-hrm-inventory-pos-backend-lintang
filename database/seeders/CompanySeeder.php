<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create(
            [
                'name'=>'LCORP',
                'email'=>'lcorp@gmail.com',
                'phone'=>'082215543372',
                'website'=>'www.lcorp.com',
                'logo'=>'https://jagoflutter.com/wp-content/uploads/2024/08/JF2.png',
                'address'=>'Jalan Flamboyan no 27a',
                'early_clock_in_time'=>15,
                'allow_clout_out_till'=>15
            ]
        );
    }
}
