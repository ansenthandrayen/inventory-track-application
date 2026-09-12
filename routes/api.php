<?php

use App\Http\Controllers\Api\EquipmentController;
use Illuminate\Support\Facades\Route;

Route::get('/equipments', [EquipmentController::class, 'index']);
Route::get('/equipments/{equipment}', [EquipmentController::class, 'show']);