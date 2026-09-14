<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Http\Requests\StoreEquipmentRequest;
use App\Http\Requests\UpdateEquipmentRequest;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    public function index(Request $request)
    {
        $query = Equipment::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('category', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $equipments = $query->latest()->paginate(5);

        return view('equipments.index', compact('equipments'));
    }

    public function create()
    {
        return view('equipments.create');
    }

    // StoreEquipmentRequest remplace Request — validation automatique avant d'arriver ici
    public function store(StoreEquipmentRequest $request)
    {
        Equipment::create($request->validated());

        return redirect()->route('equipments.index')
                         ->with('success', 'Équipement ajouté avec succès.');
    }

    public function show(Equipment $equipment)
    {
        return view('equipments.show', compact('equipment'));
    }

    public function edit(Equipment $equipment)
    {
        return view('equipments.edit', compact('equipment'));
    }

    // UpdateEquipmentRequest remplace Request — validation automatique avant d'arriver ici
    public function update(UpdateEquipmentRequest $request, Equipment $equipment)
    {
        $equipment->update($request->validated());

        return redirect()->route('equipments.index')
                         ->with('success', 'Équipement modifié avec succès.');
    }

    public function destroy(Equipment $equipment)
    {
        $equipment->delete();

        return redirect()->route('equipments.index')
                         ->with('success', 'Équipement supprimé.');
    }
}