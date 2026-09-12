@extends('layouts.app')

@section('content')

    <div class="max-w-2xl mx-auto">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Modifier un équipement</h1>

        <div class="bg-white rounded-lg shadow p-6">
            <form action="{{ route('equipments.update', $equipment) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
                    <input type="text" name="name" value="{{ old('name', $equipment->name) }}"
                           class="w-full border rounded px-3 py-2 @error('name') border-red-500 @enderror">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Catégorie</label>
                    <input type="text" name="category" value="{{ old('category', $equipment->category) }}"
                           class="w-full border rounded px-3 py-2 @error('category') border-red-500 @enderror">
                    @error('category')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Numéro de série</label>
                    <input type="text" name="serial_number" value="{{ old('serial_number', $equipment->serial_number) }}"
                           class="w-full border rounded px-3 py-2 @error('serial_number') border-red-500 @enderror">
                    @error('serial_number')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Localisation</label>
                    <input type="text" name="location" value="{{ old('location', $equipment->location) }}"
                           class="w-full border rounded px-3 py-2 @error('location') border-red-500 @enderror">
                    @error('location')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Statut</label>
                    <select name="status" class="w-full border rounded px-3 py-2 @error('status') border-red-500 @enderror">
                        <option value="">-- Choisir --</option>
                        <option value="disponible"     {{ old('status', $equipment->status) == 'disponible'     ? 'selected' : '' }}>Disponible</option>
                        <option value="en_utilisation" {{ old('status', $equipment->status) == 'en_utilisation' ? 'selected' : '' }}>En utilisation</option>
                        <option value="en_maintenance" {{ old('status', $equipment->status) == 'en_maintenance' ? 'selected' : '' }}>En maintenance</option>
                        <option value="hors_service"   {{ old('status', $equipment->status) == 'hors_service'   ? 'selected' : '' }}>Hors service</option>
                    </select>
                    @error('status')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Notes</label>
                    <textarea name="notes" rows="3"
                              class="w-full border rounded px-3 py-2">{{ old('notes', $equipment->notes) }}</textarea>
                </div>

                <div class="flex gap-3">
                    <button type="submit"
                            class="bg-blue-700 text-white px-6 py-2 rounded hover:bg-blue-800">
                        Enregistrer
                    </button>
                    <a href="{{ route('equipments.index') }}"
                       class="text-gray-600 px-6 py-2 rounded border hover:bg-gray-50">
                        Annuler
                    </a>
                </div>

            </form>
        </div>
    </div>

@endsection