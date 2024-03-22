<?php

namespace App\Http\Controllers;
use App\Models\Intervention;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;
use Carbon\Carbon;

class InterventionController extends Controller
{
    
    //get intervention
    public function getInterventions() {
      //transforme la reponse http en json
        return response()->json(Intervention::all(),200);
    }
  
      //add intervention
      public function addInterventions(Request $request) {

        // if (!$request->has('client_id')) {
        //     return response()->json(['error' => 'client_id is required'], 400);
        // }
   
        $intervention = Intervention::create($request->all());
        return response($intervention, 201);
    }
        //delete Technicien
        public function deleteInterventions(Request $request,$Num) {
  
            $intervention= Intervention::find($Num);
            if(is_null($intervention)){
                return response()->json(['message'=>'Client Not Found'],404);
            }
            $intervention->delete();
            return response(null,204);
            
          }
          
      // getinterventionsById 
public function show($Num){
    $intervention = Intervention::find($Num);
  
    if(is_null($intervention)){
      return response()->json(['message' => 'fiche introuvable'], 404);
    }
  
    return response()->json($intervention, 200);
  }

  
  //update technicien
public function updateInterventions(Request $request,$Num) {
        
    $intervention= Intervention::find($Num);
    if(is_null($intervention)){
        return response()->json(['message'=>'intervention Not Found'],404);
    }
    $intervention->update($request->all());
    return response($intervention,200);
    
  }
  
    }


