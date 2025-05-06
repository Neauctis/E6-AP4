<!DOCTYPE html>
<html lang="fr">

<head>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js" defer></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Restaurant')</title>
    @vite('resources/css/app.css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        window.Laravel = {!! json_encode(['csrfToken' => csrf_token()]) !!};
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        /* Styles de base */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
            scroll-behavior: smooth;
        }

        main {
            flex: 1;
            position: relative;
            z-index: 1;
        }

        /* Animation du menu */
        .nav-link {
            position: relative;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -4px;
            left: 0;
            background-color: theme('colors.customOrange');
            transition: width 0.3s ease-in-out;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        /* Animation du logo */
        .logo-hover {
            transition: transform 0.3s ease;
        }

        .logo-hover:hover {
            transform: scale(1.05);
        }
    </style>
</head>

<body class="bg-gradient-to-br from-gray-50 to-gray-100">
    <!-- Navbar -->
    <nav class="bg-customBlue shadow-lg">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <a href="/" class="logo-hover text-2xl font-bold text-white flex items-center space-x-2">
                    <span class="text-customOrange">B.</span>
                    <span>B.</span>
                    <span class="text-customOrange">B.</span>
                    <span>B.</span>
                </a>

                <!-- Navigation desktop -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="/" class="nav-link text-white hover:text-customOrange transition-colors duration-300">Accueil</a>
                    <a href="{{ route('menu') }}" class="nav-link text-white hover:text-customOrange transition-colors duration-300">Notre carte</a>
                    <a href="{{ route('index') }}#a-propos" class="nav-link text-white hover:text-customOrange transition-colors duration-300">À propos</a>
                    <a href="{{ route('index') }}#contact" class="nav-link text-white hover:text-customOrange transition-colors duration-300">Contact</a>
                    
                    <div class="flex items-center space-x-4">
                        @auth
                            <a href="{{ route('reserver') }}" class="bg-customOrange text-white px-6 py-2 rounded-full hover:bg-customOrange/90 transition-colors duration-300 shadow-md hover:shadow-lg">Réserver</a>
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit" class="nav-link text-white hover:text-customOrange transition-colors duration-300">
                                    Déconnexion
                                </button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="nav-link text-white hover:text-customOrange transition-colors duration-300">Connexion</a>
                            <a href="{{ route('register') }}" class="bg-customOrange text-white px-6 py-2 rounded-full hover:bg-customOrange/90 transition-colors duration-300 shadow-md hover:shadow-lg">Inscription</a>
                        @endauth
                    </div>
                </div>

                <!-- Menu burger mobile -->
                <div class="md:hidden">
                    <button class="text-white hover:text-customOrange transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Image de fond avec effet parallaxe -->
    <div class="fixed inset-0 bg-cover bg-center bg-no-repeat filter blur-sm brightness-50 -z-10 transform scale-105"
        style="background-image: url('/bg.jpg');">
    </div>

    <!-- Contenu principal -->
    <main class="container mx-auto px-4 py-10">
        <!-- Animation de fade-in pour le contenu -->
        <div class="animate-fadeIn">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-customGray/95 text-white mt-10 shadow-inner">
        <div class="container mx-auto px-6 py-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Coordonnées -->
                <div class="text-center md:text-left">
                    <h3 class="text-xl font-semibold mb-4 text-customOrange">Contact</h3>
                    <p class="mb-2">123 Rue de la Crêpe</p>
                    <p class="mb-2">75000 Paris</p>
                    <p>Tél : 01 23 45 67 89</p>
                </div>

                <!-- Liens rapides -->
                <div class="text-center">
                    <h3 class="text-xl font-semibold mb-4 text-customOrange">Liens rapides</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('menu') }}" class="hover:text-customOrange transition-colors duration-300">Notre carte</a></li>
                        @auth
                            <li><a href="{{ route('reserver') }}" class="hover:text-customOrange transition-colors duration-300">Réservations</a></li>
                        @endauth
                    </ul>
                </div>

                <!-- Réseaux sociaux -->
                <div class="text-center md:text-right">
                    <h3 class="text-xl font-semibold mb-4 text-customOrange">Suivez-nous</h3>
                    <div class="flex justify-center md:justify-end space-x-4">
                        <a href="#" class="hover:text-customOrange transition-colors duration-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path
                                    d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" />
                            </svg>
                        </a>
                        <a href="#" class="hover:text-customOrange transition-colors duration-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path
                                    d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Liens légaux et copyright -->
            <div class="border-t border-gray-700 mt-8 pt-6 text-center text-sm">
                <div class="mb-4 space-x-4">
                    <a href="{{ route('mentions-legales') }}" class="text-gray-400 hover:text-customOrange transition-colors duration-300">Mentions légales</a>
                    <span class="text-gray-600">|</span>
                    <a href="{{ route('cgu') }}" class="text-gray-400 hover:text-customOrange transition-colors duration-300">CGU</a>
                </div>
                <p>&copy; {{ date('Y') }} B.B.B.B. Tous droits réservés.</p>
            </div>
        </div>
    </footer>
</body>

</html>
