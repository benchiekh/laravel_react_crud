<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CotisationSociale extends Model
{
    use HasFactory;

    protected $fillable = [
        'fiche_de_paie_id',
        'health_contribution',
        'accident_contribution',
        'retirement_contribution',
        'family_contribution',
        'unemployment_contribution',
        'other_contributions',
        'csg_deductible',
        'csg_nondeductible',
    ];

 
    public function ficheDePaie()
    {
        return $this->belongsTo(FicheDePaie::class);
    }
}
