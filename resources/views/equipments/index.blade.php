@extends('layouts.app')

@section('content')

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Liste des équipements</h1>
        <span class="text-gray-500">{{ $equipments->count() }} équipement(s)</span>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50 border-b">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Nom</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Catégorie</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">N° Série</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Localisation</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Statut</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($equipments as $equipment)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-gray-800">{{ $equipment->name }}</td>
                        <td class="px-6 py-4 text-gray-600">{{ $equipment->category }}</td>
                        <td class="px-6 py-4 text-gray-500 text-sm">{{ $equipment->serial_number }}</td>
                        <td class="px-6 py-4 text-gray-600">{{ $equipment->location }}</td>
                        <td class="px-6 py-4">
                            @php
                                $colors = [
                                    'disponible'     => 'bg-green-100 text-green-800',
                                    'en_utilisation' => 'bg-blue-100 text-blue-800',
                                    'en_maintenance' => 'bg-yellow-100 text-yellow-800',
                                    'hors_service'   => 'bg-red-100 text-red-800',
                                ];
                            @endphp
                            <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $colors[$equipment->status] }}">
                                {{ str_replace('_', ' ', $equipment->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 flex gap-2">
                            <a href="{{ route('equipments.edit', $equipment) }}"
                               class="text-blue-600 hover:underline text-sm">Modifier</a>

                            <form action="{{ route('equipments.destroy', $equipment) }}" method="POST"
                                  onsubmit="return confirm('Supprimer cet équipement ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline text-sm">
                                    Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-gray-400">
                            Aucun équipement pour le moment.
                            <a href="{{ route('equipments.create') }}" class="text-blue-600 hover:underline ml-1">
                                Ajouter le premier
                            </a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection