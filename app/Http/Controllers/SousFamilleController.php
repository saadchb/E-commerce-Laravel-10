<?php

namespace App\Http\Controllers;

use App\Models\Famille;
use App\Models\Produit;
use App\Models\SousFamille;
use Illuminate\Http\Request;

class SousFamilleController extends Controller
{
    public function index()
    {
        if (request('search1'))
        {
            $sous_famille = SousFamille::where('libelle',"like", '%' .request('search1').'%')->paginate(6);
        }
        else
        {
            $sous_famille = SousFamille::query()->latest()->paginate(6);
        }
        $familes = Famille::all();
        $table = 'sousFamilles';
        return view('Backend.sous-familles.index', compact('sous_famille','table','familes'));
    }
    public function sous_familleDetail(Request $request , string $id){

        $famille = SousFamille::findOrfail($id);    
        $familles = Famille::all();    
        $Produits = Produit::query()->paginate(9);
        // dd($Produits);
        return view('Frontend.pages.categories_sub',compact('famille','Produits','familles'));
    }
  /**
     * Display a listing of the resource in home page.
     */
    public function HomePage(){
        
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $familles = Famille::all();
        $table = 'sousFamilles';
        return view('Backend.sous-familles.create',compact('familles','table'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

           $request->validate([
            'libelle'=>'required',
            'image'=>'required|image|mimes:jpg,png,jpeg|max:1024',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');
        $sous_famille = new SousFamille([
            'famille_id'=>$request->get('famille_id'),
            'libelle' => $request->get('libelle'),
            'image' => $imagePath,
        ]);
        $sous_famille->active = $request->has('active') ? true : false;

        // dd($famille);
        $sous_famille->save();
        return redirect()->route('sous-famille.index')->with('success', 'Sous famille Ajouteé avec succés');
    }

    /**
     * Display the specified resource.
     */
    public function show(SousFamille $sous_famille)
    {
        if (!$sous_famille) {
            abort(404);
        }
        return view('sous-familles.show', ['famille' => $sous_famille]);
    }

    /**
     * Show the form for editing the specified resource.
     */
   
        public function edit(SousFamille $sous_famille)
        {
            $familles = Famille::all();
            $table = 'sousFamilles';
            return view('Backend.sous-familles.edit', compact('sous_famille', 'familles','table'));
        }
        
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SousFamille $sous_famille)
    {
        if ($request->hasFile('image')) {
            // Store the new image file
            $imagePath = $request->file('image')->store('images', 'public');
            // Update the image path attribute of the famille model
            $sous_famille->image = $imagePath;
        }

        // Update other attributes
        $sous_famille->active = $request->has('active') ? true : false;
        $sous_famille->libelle = $request->input('libelle');
        $sous_famille->famille_id = $request->input('famille_id');

        // Save the updated model
        $sous_famille->save();

        return redirect()->route('sous-famille.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SousFamille $sous_famille)
    {
        $sous_famille->delete();
        return redirect()->route('sous-famille.index');
    }
}
