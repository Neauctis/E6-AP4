<?php

namespace App\Http\Controllers;

use App\Models\STOCK;
use App\Models\CARTE;
use App\Models\Ingredient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AllergeneController extends Controller
{
    public function index()
    {
        $ingredients = Ingredient::all();
        $stocks = STOCK::all();
        $plats = CARTE::all();
        
        return view('allergene', compact('ingredients', 'stocks', 'plats'));
    }
}
