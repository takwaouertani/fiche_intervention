<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    //get clients 
    public function getClients() {
        return response()->json(Client::all(),200);
    }

  //add Clients
  public function addClients(Request $request) {
        
    $client= Client::create($request->all());
    return response($client,201);
    
}
//update client
public function updateClients(Request $request,$Code) {
        
  $client= Client::find($Code);
  if(is_null($client)){
      return response()->json(['message'=>'Client Not Found'],404);
  }
  $client->update($request->all());
  return response($client,200);
  
}

//delete client
public function deleteClients(Request $request,$Code) {
  
  $client= Client::find($Code);
  if(is_null($client)){
      return response()->json(['message'=>'Client Not Found'],404);
  }
  $client->delete();
  return response(null,204);
  
}

// getClientsById 
public function show($code){
  $client = Client::find($code);

  if(is_null($client)){
    return response()->json(['message' => 'Client introuvable'], 404);
  }

  return response()->json($client, 200);
}

}