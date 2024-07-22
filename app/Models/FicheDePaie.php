<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FicheDePaie extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'period_start',
        'period_end',
        'contract_start',
        'seniority_date',
        'classification',
        'professional_category',
        'job_title',
        'coefficient',
        'total_monthly_compensation',
        'base_salary',
        'hourly_rate',
        'monthly_worked_hours',
        'benefits_food',
        'benefits_meal_vouchers',
        'gross_salary' // Rémunération brute calculée
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function cotisations()
    {
        return $this->hasMany(Cotisation::class);
    }
}
