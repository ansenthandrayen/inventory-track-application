<?php

use App\Http\Controllers\EquipmentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('equipments.index');
});

Route::resource('equipments', EquipmentController::class);