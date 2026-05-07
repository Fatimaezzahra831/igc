<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visa extends Model
{
    protected $fillable = [
    'nom',
    'telephone',
    'email',
    'ville',
    'pays',
    'objectif',
    'date_ready',
    'date_voyage',
    'situation',
    'salaire',
    'banque',
    'solde_banque',
    'visa_avant',
    'resultat_visa',
    'pays_visa_precedente',
    'budget',
    'rdv'
];
}
