<?php

namespace App\Http\Controllers;

use App\Models\FicheDePaie;
use Illuminate\Http\Request;

class FicheDePaieController extends Controller
{
    public function index()
    {
        $ficheDePaies = FicheDePaie::all();
        return response()->json($ficheDePaies);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'period_start' => 'required|date',
            'period_end' => 'required|date',
            'contract_start' => 'required|date',
            'seniority_date' => 'required|date',
            'classification' => 'required|string',
            'professional_category' => 'required|string',
            'job_title' => 'required|string',
            'coefficient' => 'required|string',
            'total_monthly_compensation' => 'required|numeric',
            'base_salary' => 'required|numeric',
            'hourly_rate' => 'required|numeric',
            'monthly_worked_hours' => 'required|integer',
            'benefits_food' => 'required|numeric',
            'benefits_meal_vouchers' => 'required|numeric',
        ]);
    
        // Calculer la rémunération brute
        $validated['gross_salary'] = $validated['base_salary'] + $validated['benefits_food'] + $validated['benefits_meal_vouchers'];
    
        $ficheDePaie = FicheDePaie::create($validated);
    
        return response()->json($ficheDePaie, 201);
    }
    

    public function show(FicheDePaie $ficheDePaie)
    {
        return response()->json($ficheDePaie);
    }
    public function update(Request $request, FicheDePaie $ficheDePaie)
    {
        $validated = $request->validate([
            'period_start' => 'required|date',
            'period_end' => 'required|date',
            'contract_start' => 'required|date',
            'seniority_date' => 'required|date',
            'classification' => 'required|string',
            'professional_category' => 'required|string',
            'job_title' => 'required|string',
            'coefficient' => 'required|string',
            'total_monthly_compensation' => 'required|numeric',
            'base_salary' => 'required|numeric',
            'hourly_rate' => 'required|numeric',
            'monthly_worked_hours' => 'required|integer',
            'benefits_food' => 'required|numeric',
            'benefits_meal_vouchers' => 'required|numeric',
        ]);
    
        // Calculer la rémunération brute
        $validated['gross_salary'] = $validated['base_salary'] + $validated['benefits_food'] + $validated['benefits_meal_vouchers'];
    
        $ficheDePaie->update($validated);
    
        return response()->json($ficheDePaie);
    }
    
    public function destroy(FicheDePaie $ficheDePaie)
    {
        $ficheDePaie->delete();

        return response()->json(null, 204);
    }
}
