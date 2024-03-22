<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intervention extends Model
{
    use HasFactory;
    public $timestamps =false;
    protected $primaryKey = 'Num';
    protected $fillable = ['Num','client_id','Materiels_garanties','Date_intervention','Heure_intervention','Duree_intervention','Deplacement','Diagnostic','Traveaux','Remarque','Signature'];


    public function client()
{
    return $this->belongsTo(Client::class, 'client_id', 'Code');
}

}
