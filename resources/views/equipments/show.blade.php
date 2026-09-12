@extends('layouts.app')

@section('content')

    <div class="max-w-2xl mx-auto">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">{{ $equipment->name }}</h1>
            <span class="text-sm text-gray-400">Ajouté le {{ $equipment->created_at->format('d/m/Y') }}</span>
        </div>

        <div class="bg-white rounded-lg shadow p-6 mb-4">

            @php
                $colors = [
                    'disponible'     => 'bg-green-100 text-green-800',
                    'en_utilisation' => 'bg-blue-100 text-blue-800',
                    'en_maintenance' => 'bg-yellow-100 text-yellow-800',
                    'hors_service'   => 'bg-red-100 text-red-800',
                ];
            @endphp

            <div class="grid grid-cols-2 gap-6">

                <div>
                    <p class="text-sm text-gray-500 mb-1">Catégorie</p>
                    <p class="font-medium text-gray-800">{{ $equipment->category }}</p>
                </div>

                <div>
                    <p class="text-sm text-gray-500 mb-1">Statut</p>
                    <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $colors[$equipment->status] }}">
                        {{ str_replace('_', ' ', $equipment->status) }}
                    </span>
                </div>

                <div>
                    <p class="text-sm text-gray-500 mb-1">Numéro de série</p>
                    <p class="font-medium text-gray-800">{{ $equipment->serial_number }}</p>
                </div>

                <div>
                    <p class="text-sm text-gray-500 mb-1">Localisation</p>
                    <p class="font-medium text-gray-800">{{ $equipment->location }}</p>
                </div>

            </div>

            @if($equipment->notes)
                <div class="mt-6 pt-6 border-t border-gray-100">
                    <p class="text-sm text-gray-500 mb-1">Notes</p>
                    <p class="text-gray-800">{{ $equipment->notes }}</p>
                </div>
            @endif

        </div>

        <div class="flex gap-3">
            <a href="{{ route('equipments.edit', $equipment) }}"
               class="bg-blue-700 text-white px-6 py-2 rounded hover:bg-blue-800">
                Modifier
            </a>
            <a href="{{ route('equipments.index') }}"
               class="text-gray-600 px-6 py-2 rounded border hover:bg-gray-50">
                Retour à la liste
            </a>
        </div>

    </div>

@endsection