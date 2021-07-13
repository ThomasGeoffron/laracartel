<?php

namespace App\Http\Controllers\Commercial;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Stock;
use App\Models\Transport;
use App\Models\Vente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;

class VenteController extends Controller
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
        $ventes = Vente::all();

        return view('commercial.vente.index')->with('ventes', $ventes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('add-vente')) {
            return redirect()->route('commercial.vente.index');
        }

        $stocks = Stock::all();
        $transports = Transport::all();
        $clients = Client::all();

        return view('commercial.vente.add', [
            'stocks' => $stocks,
            'transports' => $transports,
            'clients' => $clients
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $stock = Stock::all()->where('id', $request->stock)->first();
        if (($stock->qte - $request->qte) >= 0 && $request->qte > 0) {
            Vente::create($request->all());
            $stock->qte -= $request->qte;
            $stock->save();
        } else {
            return Redirect::back()->withErrors(['msg', 'La quantité saisie est supérieure à celle disponible']);
        }
        return redirect()->route('commercial.vente.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vente  $vente
     * @return \Illuminate\Http\Response
     */
    public function show(Vente $vente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vente  $vente
     * @return \Illuminate\Http\Response
     */
    public function edit(Vente $vente)
    {
        if (Gate::denies('edit-vente')) {
            return redirect()->route('commercial.vente.index');
        }

        $stocks = Stock::all();
        $transports = Transport::all();
        $clients = Client::all();

        return view('commercial.vente.edit', [
            'stocks' => $stocks,
            'transports' => $transports,
            'clients' => $clients,
            'vente' => $vente
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vente  $vente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vente $vente)
    {

        $stockModif = Stock::all()->where('id', $request->stock)->first();
        $stockInit = Stock::all()->where('id', $vente->stock)->first();
        if ($request->qte > $vente->qte && $request->stock == $vente->stock) {
            if (($stockModif->qte - $request->qte) >= 0 && $request->qte > 0) {
                $stockModif->qte -= $request->qte;
                $stockModif->save();
            } else {
                return Redirect::back()->withErrors(['msg', 'La quantité saisie est supérieure à celle disponible']);
            }
        } elseif ($request->qte <= $vente->qte && $request->stock == $vente->stock) {
            if ($request->qte > 0) {
                $stockModif->qte += ($vente->qte - $request->qte);
                $stockModif->save();
            } else {
                return Redirect::back()->withErrors(['msg', 'Veuillez saisir une quantité supérieure à 0']);
            }
        } else {
            $stockInit->qte += $vente->qte;
            $stockInit->save();
            if (($stockModif->qte - $request->qte) >= 0 && $request->qte > 0) {
                $stockModif->qte -= $request->qte;
                $stockModif->save();
            } else {
                return Redirect::back()->withErrors(['msg', 'La quantité saisie est supérieure à celle disponible']);
            }
        }

        $vente->stock = $request->stock;
        $vente->transport = $request->transport;
        $vente->client = $request->client;
        $vente->qte = $request->qte;
        $vente->date = $request->date;

        $vente->save();

        return redirect()->route('commercial.vente.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vente  $vente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vente $vente)
    {
        if (Gate::denies('delete-vente')) {
            return redirect()->route('commercial.vente.index');
        }

        $vente->delete();

        return redirect()->route('commercial.vente.index');
    }
}
