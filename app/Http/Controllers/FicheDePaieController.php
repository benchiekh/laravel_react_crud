<?php
namespace App\Http\Controllers;

use App\Models\FicheDePaie;
use App\Models\CotisationSociale;
use Illuminate\Http\Request;

class FicheDePaieController extends Controller
{
    public function index()
    {
        $ficheDePaies = FicheDePaie::with('cotisations')->get();
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
            'cotisations' => 'required|array',
            'cotisations.health_contribution' => 'required|numeric',
            'cotisations.accident_contribution' => 'required|numeric',
            'cotisations.retirement_contribution' => 'required|numeric',
            'cotisations.family_contribution' => 'required|numeric',
            'cotisations.unemployment_contribution' => 'required|numeric',
            'cotisations.other_contributions' => 'required|numeric',
            'cotisations.csg_deductible' => 'required|numeric',
            'cotisations.csg_nondeductible' => 'required|numeric'
        ]);

        // Calculer la rémunération brute
        $validated['gross_salary'] = $validated['base_salary'] + $validated['benefits_food'] + $validated['benefits_meal_vouchers'];

        $ficheDePaie = FicheDePaie::create($validated);

        foreach ($validated['cotisations'] as $key => $value) {
            $cotisation = new CotisationSociale([
                'fiche_de_paie_id' => $ficheDePaie->id,
                $key => $value,
            ]);
            $cotisation->save();
        }

        return response()->json($ficheDePaie->load('cotisations'), 201);
    }

    public function show(FicheDePaie $ficheDePaie)
    {
        return response()->json($ficheDePaie->load('cotisations'));
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
            'cotisations' => 'required|array',
            'cotisations.health_contribution' => 'required|numeric',
            'cotisations.accident_contribution' => 'required|numeric',
            'cotisations.retirement_contribution' => 'required|numeric',
            'cotisations.family_contribution' => 'required|numeric',
            'cotisations.unemployment_contribution' => 'required|numeric',
            'cotisations.other_contributions' => 'required|numeric',
            'cotisations.csg_deductible' => 'required|numeric',
            'cotisations.csg_nondeductible' => 'required|numeric'
        ]);

        // Calculer la rémunération brute
        $validated['gross_salary'] = $validated['base_salary'] + $validated['benefits_food'] + $validated['benefits_meal_vouchers'];

        $ficheDePaie->update($validated);

        $ficheDePaie->cotisations()->delete();

        foreach ($validated['cotisations'] as $key => $value) {
            $cotisation = new CotisationSociale([
                'fiche_de_paie_id' => $ficheDePaie->id,
                $key => $value,
            ]);
            $cotisation->save();
        }

        return response()->json($ficheDePaie->load('cotisations'));
    }

    public function destroy(FicheDePaie $ficheDePaie)
    {
        $ficheDePaie->cotisations()->delete();
        $ficheDePaie->delete();

        return response()->json(null, 204);
    }
}
