<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    // Liste tous les équipements
    public function index()
    {
        $equipments = Equipment::latest()->get();
        return view('equipments.index', compact('equipments'));
    }

    // Affiche le formulaire de création
    public function create()
    {
        return view('equipments.create');
    }

    // Sauvegarde en BDD
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:255',
            'category'      => 'required|string|max:255',
            'serial_number' => 'required|string|unique:equipments',
            'location'      => 'required|string|max:255',
            'status'        => 'required|in:disponible,en_utilisation,en_maintenance,hors_service',
            'notes'         => 'nullable|string',
        ]);

        Equipment::create($validated);

        return redirect()->route('equipments.index')
                        ->with('success', 'Équipement ajouté avec succès.');
    }

    // Affiche le formulaire d'édition
    public function edit(Equipment $equipment)
    {
        return view('equipments.edit', compact('equipment'));
    }

    // Met à jour en BDD
    public function update(Request $request, Equipment $equipment)
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:255',
            'category'      => 'required|string|max:255',
            'serial_number' => 'required|string|unique:equipments,serial_number,' . $equipment->id,
            'location'      => 'required|string|max:255',
            'status'        => 'required|in:disponible,en_utilisation,en_maintenance,hors_service',
            'notes'         => 'nullable|string',
        ]);

        $equipment->update($validated);

        return redirect()->route('equipments.index')
                        ->with('success', 'Équipement modifié avec succès.');
    }

    // Supprime de la BDD
    public function destroy(Equipment $equipment)
    {
        $equipment->delete();

        return redirect()->route('equipments.index')
                         ->with('success', 'Équipement supprimé.');
    }
}