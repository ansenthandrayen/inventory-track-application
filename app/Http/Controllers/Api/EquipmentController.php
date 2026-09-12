<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    // Liste tous les équipements en JSON
    public function index()
    {
        $equipments = Equipment::latest()->get();

        return response()->json([
            'success' => true,
            'count'   => $equipments->count(),
            'data'    => $equipments,
        ]);
    }

    // Détail d'un équipement en JSON
    public function show(Equipment $equipment)
    {
        return response()->json([
            'success' => true,
            'data'    => $equipment,
        ]);
    }
}