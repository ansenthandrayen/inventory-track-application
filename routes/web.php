<?php

use App\Http\Controllers\EquipmentController;
use Illuminate\Support\Facades\Route;

// Redirige vers login si pas connecté
Route::get('/', function () {
    return redirect()->route('equipments.index');
});

// Routes protégées — il faut être connecté
Route::middleware('auth')->group(function () {
    Route::resource('equipments', EquipmentController::class);
});

require __DIR__.'/auth.php';