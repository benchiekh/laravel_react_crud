<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payslip extends Model
{
    use HasFactory;
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function salaryComponents()
    {
        return $this->hasMany(SalaryComponent::class);
    }
}
