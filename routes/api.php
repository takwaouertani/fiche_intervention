<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\TechnicienController;
use App\Http\Controllers\InterventionController;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('signup', [AuthController::class,'signup']);
Route::post('login', [AuthController::class,'login']);


Route::resource('clients', ClientController::class);

//get all the clients
Route::get('clients', [ClientController::class, 'getClients']);
//addclient
Route::post('addClients', [ClientController::class, 'addClients']);
//update client
Route::put('updateClients/{Code}',[ClientController::class,'updateClients']);
//delete client
Route::delete('deleteClients/{Code}',[ClientController::class,'deleteClients']);
//bycode
Route::get('clients/{code}', [ClientController::class, 'show']);

//technicien

Route::resource('techniciens', TechnicienController::class);
//get all tchnicien
Route::get('techniciens',[TechnicienController::class,'getTechniciens']);
//addtechnicien
Route::post('addTechniciens', [TechnicienController::class, 'addTechniciens']);
//delete client
Route::delete('deleteTechniciens/{Matricule}',[TechnicienController::class,'deleteTechniciens']);
//bycode
Route::get('techniciens/{Matricule}', [TechnicienController::class, 'show']);
//update technicien
Route::put('updateTechniciens/{Matricule}',[TechnicienController::class,'updateTechniciens']);


//intervention
Route::resource('interventions', InterventionController::class);


//get all the interventions 
Route::get('/interventions',[InterventionController::class,'getInterventions']);
//add interventions
Route::post('addInterventions', [InterventionController::class,'addInterventions']);
//delete intervention
Route::delete('deleteInterventions/{matricule}',[InterventionController::class,'deleteInterventions']);
//bycode
Route::get('interventions/{Num}', [InterventionController::class, 'show']);
//update technicien
Route::put('updateInterventions/{Num}',[InterventionController::class,'updateInterventions']);

Route::group([

    'middleware' => 'api'],
     function () {

    // Route::post('logout', 'AuthController@logout');
    // Route::post('refresh', 'AuthController@refresh');
    // Route::post('me', 'AuthController@me');

});