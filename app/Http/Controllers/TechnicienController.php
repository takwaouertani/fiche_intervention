<?php

namespace App\Http\Controllers;

use App\Models\Technicien;

use Illuminate\Http\Request;

class TechnicienController extends Controller
{
       //get technicien
       public function getTechniciens() {
        return response()->json(Technicien::all(),200);
    }

    //addTechnicien
    public function addTechniciens(Request $request) {
        
        $technicien= Technicien::create($request->all());
        return response($technicien,201);
        
    }
    //delete Technicien
    public function deleteTechniciens(Request $request,$Matricule) {
  
        $technicien= Technicien::find($Matricule);
        if(is_null($technicien)){
            return response()->json(['message'=>'Client Not Found'],404);
        }
        $technicien->delete();
        return response(null,204);
        
      }

      // gettechniciensById 
public function show($Matricule){
    $technicien = Technicien::find($Matricule);
  
    if(is_null($technicien)){
      return response()->json(['message' => 'Client introuvable'], 404);
    }
  
    return response()->json($technicien, 200);
  }
  //update technicien
public function updateTechniciens(Request $request,$Matricule) {
        
    $technicien= Technicien::find($Matricule);
    if(is_null($technicien)){
        return response()->json(['message'=>'Client Not Found'],404);
    }
    $technicien->update($request->all());
    return response($technicien,200);
    
  }
  
}
