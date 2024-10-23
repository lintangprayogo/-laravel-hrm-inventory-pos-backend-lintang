<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BasicSalary extends Model
{
    //
    protected $fillable = ["company_id","user_id","basic_salary"];

    public function company(){
        $this->BelongsTo(Company::class);
    }

    public function user(){
        $this->BelongsTo(User::class);
    }

}
