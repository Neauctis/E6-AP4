@extends('layouts.app')

@section('title', 'Accueil - B.B.B.B.')

@section('content')


    <div class="text-center">
        <h1 class="text-4xl font-bold text-white mb-6">Bienvenue chez Bilig Bilig Bang Bang</h1>
        <p class="text-lg text-white/80">Dégustez les meilleurs crêpes et galettes faites maison dans une ambiance conviviale.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-10">
        <!-- Horaires -->
        <div class="bg-white rounded-2xl shadow-lg p-6 flex flex-col justify-center hover:shadow-xl transition-shadow duration-300">
            <h2 class="text-2xl font-bold text-center text-customGray">Horaires</h2>
            <div class="mt-8 space-y-4 flex flex-col items-center flex-grow justify-center">
                <p class="text-customGray/80 text-center leading-relaxed">
                    <span class="font-semibold text-customBlue">Du lundi au samedi</span><br>
                    Le restaurant : 12h-22h<br><br>
                    <span class="font-semibold text-customBlue">Services :</span><br>
                    Midi : 12h00 - 13h30<br>
                    Après-midi : 13h30 - 15h00<br><br>
                    Soir 1er service : 19h00 - 20h30<br>
                    Soir 2ème service : 20h30 - 22h00<br><br>
                    <span class="text-customOrange">Fermé le Dimanche</span><br>
                    <span class="text-customBlue">Ouvert les jours fériés</span>
                </p>
            </div>
        </div>
        
        <!-- Réservation -->
        <div class="bg-white rounded-2xl shadow-lg p-6 flex flex-col justify-center hover:shadow-xl transition-shadow duration-300">
            <h2 class="text-2xl font-bold text-center text-customGray">Réserver une table</h2>
            <div class="mt-8 space-y-4 flex flex-col items-center flex-grow justify-center">
                <p class="text-customGray/80 text-center">Découvrez notre carte et réservez votre table pour passer un moment inoubliable.</p>
                <div class="flex gap-4 w-full mt-4">
                    <a href="{{ route('menu') }}" class="flex-1 border-2 bg-customBlue text-white py-3 px-6 text-center rounded-xl hover:bg-customBlue/90 transition-colors duration-300">
                        Notre carte
                    </a>
                    @auth
                        <a href="{{ route('reserver') }}" class="flex-1 bg-customOrange text-white py-3 px-6 text-center rounded-xl hover:bg-customOrange/90 transition-colors duration-300">
                            Réserver
                        </a>
                    @else
                        <button disabled class="flex-1 bg-gray-400 text-white py-3 px-6 text-center rounded-xl cursor-not-allowed">
                            Connectez-vous pour réserver
                        </button>
                    @endauth
                </div>
            </div>
        </div>
    </div>
<div id="a-propos">
    <br>
    <h1 class="text-4xl font-bold text-center text-white mt-16">À propos</h1>
    <br>
</div>
    <div class="bg-white rounded-2xl shadow-lg p-6 flex flex-col justify-center hover:shadow-xl transition-shadow duration-300 py-16 my-12">
        <div class="max-w-1xl mx-auto space-y-16 px-4">
            <section class="relative">
                <div class="absolute -left-4 top-0 w-1 h-full bg-customBlue rounded-full opacity-50"></div>
                <h2 class="text-3xl font-bold text-customGray mb-6 space-y-2">Le Bilig Bilig Bang Bang – Restaurant de galettes et crêpes à Camoël</h2>
                <div class="space-y-4">
                    <p class="text-lg text-customGray/80 leading-relaxed text-justify">Véritable invitation à la gourmandise, le restaurant <strong class="text-customBlue">Le Bilig Bilig Bang Bang</strong> de Camoël vous propose une carte de crêpes et galettes faites maison avec des produits frais, des recettes authentiques et un accueil chaleureux.</p>
                    <p class="text-lg text-customGray/80 leading-relaxed text-justify">Venez découvrir ce restaurant cosy, au cœur de Camoël, où chaque bouchée est un voyage dans la tradition bretonne, avec des crêpes sucrées et salées, à savourer dans une ambiance conviviale et détendue.</p>
                    <p class="text-lg text-customGray/80 leading-relaxed text-justify">Toute l'équipe de <strong class="text-customBlue">B.B.B.B.</strong> vous accueille pour une pause gourmande à toute heure, que ce soit pour un déjeuner, un dîner ou une simple envie de crêpes entre amis ou en famille.</p>
                </div>
            </section>
    
            <section class="relative">
                <div class="absolute -left-4 top-0 w-1 h-full bg-customOrange rounded-full opacity-50"></div>
                <h2 class="text-3xl font-bold text-customGray mb-6 space-y-2">Une crêperie bretonne à Camoël</h2>
                <div class="space-y-4">
                    <p class="text-lg text-customGray/80 leading-relaxed text-justify">À quelques pas du centre-ville de Camoël, le restaurant <strong class="text-customBlue">Le Bilig Bilig Bang Bang</strong> vous invite à savourer la véritable cuisine bretonne dans un cadre chaleureux et familial.</p>
                    <p class="text-lg text-customGray/80 leading-relaxed text-justify">Que ce soit en terrasse ou dans notre salle, partagez un moment agréable autour de nos crêpes et galettes artisanales, préparées avec soin et des produits locaux de qualité, le tout dans un environnement où règne une atmosphère conviviale, idéale pour un repas entre amis, en famille ou en couple.</p>
                    <p class="text-lg text-customGray/80 leading-relaxed text-justify">Pour un accès facilité, un parking est disponible à proximité.</p>
                </div>
            </section>
    
            <section class="relative">
                <div class="absolute -left-4 top-0 w-1 h-full bg-customBlue rounded-full opacity-50"></div>
                <h2 class="text-3xl font-bold text-customGray mb-6 space-y-2">La crêperie bretonne par excellence à Camoël</h2>
                <div class="space-y-4">
                    <p class="text-lg text-customGray/80 leading-relaxed text-justify">Avec <strong class="text-customBlue">B.B.B.B.</strong>, c'est avant tout une passion pour la crêpe et la galette, où chaque recette est réalisée à partir des meilleurs produits du terroir breton, en harmonie avec les saveurs du moment.</p>
                    <p class="text-lg text-customGray/80 leading-relaxed text-justify">Au fil des saisons, nous avons à cœur de vous proposer des crêpes et galettes savoureuses, généreuses et élaborées avec des ingrédients frais, en respectant les traditions et en y ajoutant une touche créative qui fait notre signature. Découvrez notre carte de galettes de sarrasin, crêpes sucrées, et nos menus spéciaux.</p>
                </div>
            </section>
    
            <section class="relative">
                <div class="absolute -left-4 top-0 w-1 h-full bg-customOrange rounded-full opacity-50"></div>
                <h2 class="text-3xl font-bold text-customGray mb-6 space-y-2">Organisez vos repas à Le Bilig Bilig Bang Bang, restaurant à Camoël</h2>
                <div class="space-y-4">
                    <p class="text-lg text-customGray/80 leading-relaxed text-justify">Le restaurant <strong class="text-customBlue">B.B.B.B.</strong> s'adapte à vos besoins pour accueillir des groupes, des événements familiaux ou professionnels, tels que des repas de groupe, des repas d'anniversaire, ou des séminaires.</p>
                    <p class="text-lg text-customGray/80 leading-relaxed text-justify">Pour répondre à vos demandes spécifiques, nous vous offrons la possibilité de privatiser des espaces pour une demi-journée ou une journée complète, en fonction de vos attentes.</p>
                    <p class="text-lg text-customGray/80 leading-relaxed text-justify">Couronnez vos moments festifs avec nos galettes de qualité, servies avec des produits frais, ou laissez-vous tenter par notre sélection de crêpes sucrées pour un dessert de rêve.</p>
                </div>
            </section>
        </div>
    </div>

    <div id="contact">
        <h1 class="text-4xl font-bold text-center text-white mt-16 mb-10">Contactez-nous</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white rounded-2xl shadow-lg p-6 flex flex-col justify-center hover:shadow-xl transition-shadow duration-300">
                <h2 class="text-2xl font-bold text-center text-customGray">Téléphone</h2>
                <div class="mt-8 space-y-4 flex flex-col items-center flex-grow justify-center">
                    <p class="text-customGray/80 text-center text-xl">01 23 45 67 89</p>
                    <a href="tel:0299XXXXXX" class="w-full border-2 bg-customBlue text-white py-3 px-6 text-center rounded-xl hover:bg-customBlue/90 transition-colors duration-300">
                        Appeler maintenant
                    </a>
                </div>
            </div>
            
            <div class="bg-white rounded-2xl shadow-lg p-6 flex flex-col justify-center hover:shadow-xl transition-shadow duration-300">
                <h2 class="text-2xl font-bold text-center text-customGray">Email</h2>
                <div class="mt-8 space-y-4 flex flex-col items-center flex-grow justify-center">
                    <p class="text-customGray/80 text-center text-xl">contact@bbbb.fr</p>
                    <a href="mailto:contact@bbbb.fr" class="w-full border-2 bg-customBlue text-white py-3 px-6 text-center rounded-xl hover:bg-customBlue/90 transition-colors duration-300">
                        Envoyer un email
                    </a>
                </div>
            </div>
            
            <div class="bg-white rounded-2xl shadow-lg p-6 flex flex-col justify-center hover:shadow-xl transition-shadow duration-300">
                <h2 class="text-2xl font-bold text-center text-customGray">Adresse</h2>
                <div class="mt-8 space-y-4 flex flex-col items-center flex-grow justify-center">
                    <p class="text-customGray/80 text-center text-xl">
                        123 Rue de la Crêpe<br>
                        56130 Camoël
                    </p>
                    <a href="https://maps.google.com" target="_blank" class="w-full bg-customOrange text-white py-3 px-6 text-center rounded-xl hover:bg-customOrange/90 transition-colors duration-300">
                        Voir sur la carte
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection