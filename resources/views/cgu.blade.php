@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-16">
    <div class="bg-white/90 rounded-lg shadow-xl p-8 max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold mb-6">Conditions Générales d'Utilisation</h1>
        
        <div class="space-y-6 text-gray-700">
            <section>
                <h2 class="text-xl font-semibold mb-3">1. Réservations</h2>
                <p>Les réservations effectuées sur le site sont soumises aux conditions suivantes :</p>
                <ul class="list-disc pl-5 mt-2">
                    <li>Une réservation peut être annulée jusqu'à 24h avant le service</li>
                    <li>Le restaurant se réserve le droit de disposer de la table après 15 minutes de retard</li>
                </ul>
            </section>

            <section>
                <h2 class="text-xl font-semibold mb-3">2. Protection des données</h2>
                <p>Les informations collectées sont utilisées uniquement dans le cadre de la réservation.</p>
            </section>
        </div>
    </div>
</div>
@endsection
