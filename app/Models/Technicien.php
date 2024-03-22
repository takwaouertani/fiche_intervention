<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technicien extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'Matricule';
    public $incrementing = false;
    protected $fillable = ['Matricule','Nom','Prenom','Motorise','Telephone'];

}
