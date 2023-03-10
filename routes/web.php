<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;
 
Route::resource("/vehicles", VehicleController::class); 
