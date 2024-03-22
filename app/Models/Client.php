<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    public $timestamps =false;
    protected $primaryKey = 'Code';
    public $incrementing = false;

    protected $fillable = ['Code','Raison_sociale','Adresse','Contact','Mail','Matricule_fiscale'];
}
