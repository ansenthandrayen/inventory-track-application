<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEquipmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'          => 'required|string|max:255',
            'category'      => 'required|string|max:255',
            // ignore l'équipement actuel dans la vérification d'unicité
            'serial_number' => 'required|string|unique:equipments,serial_number,' . $this->equipment->id,
            'location'      => 'required|string|max:255',
            'status'        => 'required|in:disponible,en_utilisation,en_maintenance,hors_service',
            'notes'         => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'          => 'Le nom est obligatoire.',
            'category.required'      => 'La catégorie est obligatoire.',
            'serial_number.required' => 'Le numéro de série est obligatoire.',
            'serial_number.unique'   => 'Ce numéro de série existe déjà.',
            'location.required'      => 'La localisation est obligatoire.',
            'status.required'        => 'Le statut est obligatoire.',
            'status.in'              => 'Le statut choisi est invalide.',
        ];
    }
}