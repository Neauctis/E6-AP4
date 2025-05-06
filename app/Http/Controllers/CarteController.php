<?php

namespace App\Http\Controllers;

use App\Models\Plat;
use App\Models\Type;
use App\Models\CARTE;
use App\Models\ESTUN;
use App\Models\STOCK;
use App\Models\CATEGORIE;
use App\Models\INGREDIENT;
use Illuminate\Http\Request;
use App\Models\TYPECATEGORIE;
use Illuminate\Support\Facades\Auth;

class CarteController extends Controller
{
    public function menu(Request $request)
    {
        $types = TYPECATEGORIE::all();
        $est_un = ESTUN::all();
        $categories = CATEGORIE::all();
        $plats = CARTE::all();
        $stocks = STOCK::all();
        $ingredients = INGREDIENT::all();
        return view('carte', compact('types', 'categories', 'plats', 'stocks', 'ingredients','est_un'));
    }

    public function menuAllergenes(Request $request)
    {
        $ingredients = Ingredient::all();
        $stocks = STOCK::all();
        $plats = CARTE::all();
        
        return view('allergene', compact('ingredients', 'plats', 'stocks'));
    }
}
