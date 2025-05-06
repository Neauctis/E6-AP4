@extends('layouts.app')

@section('title', 'Menu - B.B.B.B.')

@section('content')
    <div class="relative">
        <div class="text-center pt-16 pb-12">
            <h1 class="text-5xl font-bold text-white mb-4">Notre carte</h1>
            <p class="text-xl text-white/90 max-w-2xl mx-auto">Découvrez nos spécialités par catégorie</p>
            
            <!-- Légende des allergènes -->
            <div class="mt-8 inline-block bg-white/95 px-6 py-3 rounded-lg">
                <p class="text-sm text-customGray flex items-center gap-2">
                    <span class="font-bold text-customOrange">⚠️</span>
                    Les allergènes sont indiqués en <span class="font-bold text-customOrange">orange</span>
                </p>
            </div>
        </div>

        <div class="max-w-4xl mx-auto mt-8 px-4 pb-20">
            @foreach($types as $type)
                @php
                    $typeCategories = $est_un->where('IDTYPE', $type->idtype)->pluck('IDCATEGORIE');
                    $hasPlats = false;
                    foreach($typeCategories as $categoryId) {
                        if($plats->where('IDCATEGORIE', $categoryId)->isNotEmpty()) {
                            $hasPlats = true;
                            break;
                        }
                    }
                @endphp
                @if($hasPlats)
                    <div class="bg-white/95 backdrop-blur-sm rounded-2xl shadow-lg shadow-black/5 overflow-hidden border border-white/20 mb-8">
                        <div class="w-full px-8 py-5 border-b border-gray-200/50">
                            <h2 class="text-2xl font-bold text-customGray">
                                {{ $type->libelletype }}
                            </h2>
                        </div>

                        <div class="p-8">
                            @foreach($typeCategories as $categoryId)
                                @php
                                    $category = $categories->where('IDCATEGORIE', $categoryId)->first();
                                    $categoryPlats = $plats->where('IDCATEGORIE', $categoryId);
                                @endphp
                                @if($category && $categoryPlats->isNotEmpty())
                                    <div class="mb-8 last:mb-0">
                                        <h3 class="text-xl font-semibold text-customBlue mb-6 border-l-4 border-customOrange pl-4">
                                            {{ $category->LIBELLE }}
                                        </h3>
                                        
                                        <div class="space-y-6">
                                            @foreach($categoryPlats as $plat)
                                                <div class="group">
                                                    <div class="flex justify-between items-start">
                                                        <div class="flex-1">
                                                            <h4 class="text-lg font-semibold text-customGray group-hover:scale-105 group-hover:pl-2 transition-all duration-300">
                                                                {{ $plat->TITRE }}
                                                            </h4>
                                                            <p class="text-customGray/70 text-base mt-2 leading-relaxed">
                                                                @php
                                                                    $platIngredients = $ingredients->where('IDPLAT', $plat->IDPLAT);
                                                                    $ingredientsList = [];
                                                                    
                                                                    foreach($platIngredients as $ingredient) {
                                                                        $stock = $stocks->where('IDSTOCK', $ingredient->IDSTOCK)->first();
                                                                        if($stock) {
                                                                            if($stock->ALLERGENE == 1) {
                                                                                // Ingrédient allergène en orange normal
                                                                                $ingredientsList[] = '<span class="font-bold text-customOrange" title="Allergène">' . $stock->PRODUIT . '</span>';
                                                                            } else {
                                                                                // Ingrédient normal
                                                                                $ingredientsList[] = $stock->PRODUIT;
                                                                            }
                                                                        }
                                                                    }
                                                                @endphp
                                                                <span>
                                                                    {!! implode(', ', $ingredientsList) !!}
                                                                </span>
                                                            </p>
                                                        </div>
                                                        <p class="text-customBlue font-bold text-lg ml-6 whitespace-nowrap">
                                                            {{ number_format($plat->PRIX, 2) }}€
                                                        </p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection