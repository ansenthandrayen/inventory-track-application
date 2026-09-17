<nav class="bg-blue-700 text-white px-6 py-4 flex justify-between items-center">
    <a href="{{ route('equipments.index') }}" class="text-xl font-bold">
        InventoryTrack
    </a>

    <div class="flex items-center gap-4">
        <a href="{{ route('equipments.create') }}" class="bg-white text-blue-700 px-4 py-2 rounded font-semibold hover:bg-blue-50">
            + Ajouter un équipement
        </a>

        <span class="text-blue-200">{{ Auth::user()->name }}</span>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-blue-200 hover:text-white text-sm">
                Déconnexion
            </button>
        </form>
    </div>
</nav>