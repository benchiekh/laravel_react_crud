<?php
namespace App\Http\Controllers;

use App\Models\Cotisation;
use App\Models\FicheDePaie;
use Illuminate\Http\Request;

class CotisationController extends Controller
{
    public function index($ficheDePaieId)
    {
        $ficheDePaie = FicheDePaie::findOrFail($ficheDePaieId);
        return response()->json($ficheDePaie->cotisations);
    }

    public function store(Request $request, $ficheDePaieId)
    {
        $request->validate([
            'health_contribution' => 'nullable|numeric',
            'accident_contribution' => 'nullable|numeric',
            'retirement_contribution' => 'nullable|numeric',
            'family_contribution' => 'nullable|numeric',
            'unemployment_contribution' => 'nullable|numeric',
            'other_contributions' => 'nullable|numeric',
            'csg_deductible' => 'nullable|numeric',
            'csg_nondeductible' => 'nullable|numeric',
        ]);

        $ficheDePaie = FicheDePaie::findOrFail($ficheDePaieId);

        $cotisation = new Cotisation($request->all());
        $cotisation->fiche_de_paie_id = $ficheDePaie->id;
        $cotisation->save();

        return response()->json($cotisation, 201);
    }

    public function show($ficheDePaieId, $cotisationId)
    {
        $cotisation = Cotisation::where('fiche_de_paie_id', $ficheDePaieId)->findOrFail($cotisationId);
        return response()->json($cotisation);
    }

    public function update(Request $request, $ficheDePaieId, $cotisationId)
    {
        $request->validate([
            'health_contribution' => 'nullable|numeric',
            'accident_contribution' => 'nullable|numeric',
            'retirement_contribution' => 'nullable|numeric',
            'family_contribution' => 'nullable|numeric',
            'unemployment_contribution' => 'nullable|numeric',
            'other_contributions' => 'nullable|numeric',
            'csg_deductible' => 'nullable|numeric',
            'csg_nondeductible' => 'nullable|numeric',
        ]);

        $cotisation = Cotisation::where('fiche_de_paie_id', $ficheDePaieId)->findOrFail($cotisationId);
        $cotisation->update($request->all());

        return response()->json($cotisation);
    }

    public function destroy($ficheDePaieId, $cotisationId)
    {
        $cotisation = Cotisation::where('fiche_de_paie_id', $ficheDePaieId)->findOrFail($cotisationId);
        $cotisation->delete();

        return response()->json(null, 204);
    }
}
