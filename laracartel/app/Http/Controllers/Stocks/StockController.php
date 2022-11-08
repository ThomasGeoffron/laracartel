<?php

namespace App\Http\Controllers\Stocks;

use App\Http\Controllers\Controller;
use App\Http\Requests\StockRequest;
use App\Models\Arme;
use App\Models\Entrepot;
use App\Models\Produit;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;

class StockController extends Controller
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
        $stocks = Stock::all();

        return view('stocks.index')->with('stocks', $stocks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $entrepots = Entrepot::all();
        $armes = Arme::all();
        $produits = Produit::all();

        return view('stocks.add', [
            'entrepots' => $entrepots,
            'armes' => $armes,
            'produits' => $produits
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StockRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StockRequest $request)
    {
        $entrepot = Entrepot::all()->where('id', $request->entrepot)->first();
        $stockTotal = 0;
        foreach ($entrepot->stocks() as $oneStock) {
            $stockTotal += $oneStock->qte;
        }
        $stockTotal += $request->qte;
        if ($stockTotal > $entrepot->capacite) {
            return Redirect::back()->with('error', 'La quantité saisie est supérieure à celle disponible');
        }
        Stock::create([
            'entrepot' => $request->entrepot,
            'arme' => $request->arme != "default" ? $request->arme : null,
            'produit' => $request->produit != "default" ? $request->produit : null,
            'qte' => $request->qte
        ]);

        return redirect()->route('stocks.stock.index')->with('success', 'Toujours plus de stock !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {
        $entrepots = Entrepot::all();
        $armes = Arme::all();
        $produits = Produit::all();

        return view('stocks.edit', [
            'stock' => $stock,
            'entrepots' => $entrepots,
            'armes' => $armes,
            'produits' => $produits
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StockRequest  $request
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(StockRequest $request, Stock $stock)
    {
        $entrepot = Entrepot::all()->where('id', $request->entrepot)->first();
        $stockTotal = 0;
        foreach ($entrepot->stocks() as $oneStock) {
            $stockTotal += $oneStock->qte;
        }
        $stockTotal += $request->qte;
        if ($stockTotal > $entrepot->capacite) {
            return Redirect::back()->with('error', 'La quantité saisie est supérieure à celle disponible');
        }
        $stock->entrepot = $request->entrepot;
        $stock->arme = $request->arme != "default" ? $request->arme : null;
        $stock->produit = $request->produit != "default" ? $request->produit : null;
        $stock->qte = $request->qte;

        $stock->save();

        return redirect()->route('stocks.stock.index')->with('success', 'Stock réajusté !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
        if (Gate::denies('delete-produit')) {
            return redirect()->route('stocks.stock.index');
        }

        $stock->delete();

        return redirect()->route('stocks.stock.index')->with('success', 'Stock supprimé avec succès !');
    }
}
