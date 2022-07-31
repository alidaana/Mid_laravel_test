<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehiclesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get("/vehicles/{id?}",[VehiclesController::class, "index"]);
Route::post("/vehicles/add", [VehiclesController::class,"addVehicle"]);
Route::put("/vehicles/{id}", [VehiclesController::class,"updateVehicle"]);
Route::get("/vehicles/search/{make}", [VehiclesController::class,"searchVehicle"]);
Route::delete("/vehicles/delete/{id}", [VehiclesController::class,"deleteVehicle"]);
