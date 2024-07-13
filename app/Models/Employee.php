<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'email', 
        'position', 
        'department', 
        'hire_date',
        'address', // Ajout de l'adresse
        'siret',   // Ajout du numéro de SIRET
        'ape_code', // Ajout du code APE
        'collective_agreement', // Ajout de la convention collective
        'social_security_payment_location',
    ];

    public function fiche_de_paie()
    {
        return $this->hasMany(FicheDePaie::class);
    }
}
