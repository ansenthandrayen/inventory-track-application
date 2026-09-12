<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InventoryTrack</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

    <nav class="bg-blue-700 text-white px-6 py-4 flex justify-between items-center">
        <a href="{{ route('equipments.index') }}" class="text-xl font-bold">
            InventoryTrack
        </a>
        <a href="{{ route('equipments.create') }}" class="bg-white text-blue-700 px-4 py-2 rounded font-semibold hover:bg-blue-50">
            + Ajouter un équipement
        </a>
    </nav>

    <main class="max-w-6xl mx-auto px-6 py-8">
        {{-- Message de succès --}}
        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

</body>
</html>