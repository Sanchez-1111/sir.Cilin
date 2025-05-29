<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\Api\VehicleController;

Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/get-users', [UserController::class, 'getUsers']);
    Route::post('/add-user', [UserController::class, 'addUser']);
    Route::put('/edit-user/{id}', [UserController::class, 'editUser']);
    Route::delete('/delete-user/{id}', [UserController::class, 'deleteUser']);

    Route::get('/get-sales', [SalesController::class, 'getsales']);
    Route::post('/add-sales', [SalesController::class, 'addSales']);
    Route::put('/edit-sales/{id}', [SalesController::class, 'editSales']);
    Route::delete('/delete-sales/{id}', [SalesController::class, 'deleteSales']);

    Route::get('/get-vehicles', [VehicleController::class, 'getVehicles']);
    Route::post('/add-vehicle', [VehicleController::class, 'addVehicle']);
    Route::put('/edit-vehicle/{id}', [VehicleController::class, 'editVehicle']);
    Route::delete('/delete-vehicle/{id}', [VehicleController::class, 'deleteVehicle']);

    Route::post('/logout', [AuthenticationController::class, 'logout']);

 });
