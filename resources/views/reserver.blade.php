@extends('layouts.app')

@section('content')

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-3xl">
        <!-- En-tête -->
        <div class="text-center mb-10">
            <h1 class="text-3xl font-extrabold text-white sm:text-4xl">
                Réserver une table
            </h1>
            <p class="mt-3 text-lg text-white">
                Réservez votre table en quelques clics
            </p>
            
            @if(session('success'))
                <div class="mt-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="mt-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                    {{ session('error') }}
                </div>
            @endif
        </div>

        <!-- Formulaire -->
        <div class="bg-white shadow-xl rounded-lg overflow-hidden">
            <div class="px-6 py-8 sm:p-10">
                <form method="POST" action="{{ route('reserver.store') }}" class="space-y-6">
                    @csrf
                    
                    <!-- Nombre de couverts -->
                    <div class="space-y-2">
                        <label for="covers" class="block text-sm font-semibold text-gray-700">
                            Nombre de couverts
                        </label>
                        <select id="covers" name="covers" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm transition duration-150">
                            @for ($i = 1; $i <= 10; $i++)
                                <option value="{{ $i }}">{{ $i }} {{ $i === 1 ? 'personne' : 'personnes' }}</option>
                            @endfor
                        </select>
                    </div>

                    <!-- Date -->
                    <div class="space-y-2">
                        <label for="date" class="block text-sm font-semibold text-gray-700">
                            Date de réservation
                        </label>
                        <input type="date" 
                               id="date" 
                               name="date" 
                               min="{{ date('Y-m-d') }}"
                               max="{{ date('Y-m-d', strtotime('+2 months')) }}"
                               value="{{ date('Y-m-d') }}"
                               class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm transition duration-150"
                               required>
                    </div>

                    <!-- Service -->
                    <div class="space-y-2">
                        <label for="service" class="block text-sm font-semibold text-gray-700">
                            Service
                        </label>
                        <select id="service" name="service" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm transition duration-150">
                            <option value="" disabled selected>Choisissez un service</option>
                            @foreach ($services as $service)
                                <option value="{{ $service->ID_SERVICE }}">
                                    {{ $service->HEUREDEBUT->format('H:i') }} - {{ $service->HEUREFIN->format('H:i') }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Emplacement -->
                    <div class="space-y-2">
                        <label for="location" class="block text-sm font-semibold text-gray-700">
                            Emplacement
                        </label>
                        <select id="location" name="location" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm transition duration-150">
                            @foreach ($emplacements as $emplacement)
                                <option value="{{ $emplacement->IDEMPLACEMENT }}">{{ $emplacement->LIBELLEEMPLACEMENT }}</option>
                                @endforeach
                        </select>
                    </div>

                    <!-- Table -->
                    <div class="space-y-2">
                        <label for="table" class="block text-sm font-semibold text-gray-700">
                            Table disponible
                        </label>
                        <select id="table" name="table" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm transition duration-150">
                            <option value="" disabled selected>Sélectionnez d'abord un emplacement</option>
                        </select>
                    </div>

                    <script>
                        function updateTables() {
                            const locationSelect = document.getElementById('location');
                            const serviceSelect = document.getElementById('service');
                            const coversSelect = document.getElementById('covers');
                            const dateSelect = document.getElementById('date');
                            const tableSelect = document.getElementById('table');

                            if (!serviceSelect.value || !locationSelect.value || !dateSelect.value) {
                                tableSelect.innerHTML = '<option value="" disabled selected>Choisissez d\'abord une date, un service et un emplacement</option>';
                                return;
                            }

                            // Appel à l'API pour récupérer les tables disponibles avec la date
                            fetch(`/api/available-tables?service=${serviceSelect.value}&location=${locationSelect.value}&covers=${coversSelect.value}&date=${dateSelect.value}`)
                                .then(response => response.json())
                                .then(tables => {
                                    tableSelect.innerHTML = '<option value="" disabled selected>Choisissez une table</option>';
                                    
                                    if (tables.length === 0) {
                                        tableSelect.innerHTML = '<option value="" disabled selected>Aucune table disponible</option>';
                                    } else {
                                        tables.forEach(table => {
                                            tableSelect.innerHTML += `
                                                <option value="${table.ID_TABLE}">Table ${table.ID_TABLE}</option>
                                            `;
                                        });
                                    }
                                })
                                .catch(error => {
                                    console.error('Erreur:', error);
                                    tableSelect.innerHTML = '<option value="" disabled selected>Erreur lors du chargement</option>';
                                });
                        }

                        // Ajouter les événements change
                        document.getElementById('location').addEventListener('change', updateTables);
                        document.getElementById('covers').addEventListener('change', updateTables);
                        document.getElementById('service').addEventListener('change', updateTables);
                        document.getElementById('date').addEventListener('change', updateTables);
                    </script>

                   
                    <!-- Bouton de soumission -->
                    <div class="pt-6">
                        <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150">
                            Confirmer la réservation
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Note de bas de page -->
        <p class="mt-4 text-center text-sm text-white">
            Pour annuler votre table appeler nous en cliquant sur "Contact".
        </p>
    </div>
</div>
@endsection