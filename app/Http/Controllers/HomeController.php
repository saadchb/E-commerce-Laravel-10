<?php

namespace App\Http\Controllers;

use App\Models\Famille;
use App\Models\marque;
use App\Models\Produit;
use App\Models\Review;
use App\Models\SousFamille;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Produit::all();
        $Soufamilles = SousFamille::all();
        $familles = Famille::all();
        $itemInfamille = Produit::count();
        $marques = marque::all();
        // $produit = Produit::findOrFail($id);
        // $reviews = Review::where('produit_id','LIKE',"{$id}")->paginate(8);
        $reviews = Review::leftJoin('produits', 'produits.id', '=', 'reviews.produit_id')
        ->select('produits.id', 'produits.designation', 'produits.prix_ht', 'produits.prix_vente', 'produits.image', 'reviews.rating')
        ->get();
    
    

        return view('Frontend.Home',compact('Soufamilles','products','marques','familles','itemInfamille','reviews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
