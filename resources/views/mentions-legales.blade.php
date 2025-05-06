@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-16">
    <div class="bg-white/90 rounded-lg shadow-xl p-8 max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold mb-6">Mentions Légales</h1>
        
        <div class="space-y-6 text-gray-700">
            <section>
                <h2 class="text-xl font-semibold mb-3">1. Informations légales</h2>
                <p>Nom du restaurant : B.B.B.B.</p>
                <p>Adresse : 123 rue de la Gastronomie, 75000 Paris</p>
                <p>SIRET : 123 456 789 00001</p>
                <p>Téléphone : 01 23 45 67 89</p>
                <p>Email : contact@bbbb-restaurant.fr</p>
            </section>

            <section>
                <h2 class="text-xl font-semibold mb-3">2. Hébergement</h2>
                <p>Le site est hébergé par Example Hosting</p>
                <p>Adresse : 1 rue de l'Internet, 75000 Paris</p>
            </section>
        </div>
    </div>
</div>
@endsection
