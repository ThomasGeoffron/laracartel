<?php

namespace App\Http\Controllers\Stocks;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProduitRequest;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProduitController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produits = Produit::all();

        return view('stocks.produit.index')->with('produits', $produits);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('add-produit')) {
            return redirect()->route('stocks.produit.index');
        }
        return view('stocks.produit.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ProduitRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProduitRequest $request)
    {
        Produit::create($request->all());

        return redirect()->route('stocks.produit.index')->with('success', 'Nouveau produit !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function show(produit $produit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function edit(produit $produit)
    {
        if (Gate::denies('edit-produit')) {
            return redirect()->route('stocks.produit.index');
        }

        return view('stocks.produit.edit', [
            'produit' => $produit
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ProduitRequest  $request
     * @param  \App\Models\produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function update(ProduitRequest $request, produit $produit)
    {
        $produit->designation = $request->designation;
        $produit->description = $request->description;
        $produit->pu = $request->pu;

        $produit->save();

        return redirect()->route('stocks.produit.index')->with('success', 'On a modifié la formule !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function destroy(produit $produit)
    {
        if (Gate::denies('delete-produit')) {
            return redirect()->route('stocks.produit.index');
        }

        $produit->delete();

        return redirect()->route('stocks.produit.index')->with('success', 'Produit supprimé avec succès !');
    }
}
