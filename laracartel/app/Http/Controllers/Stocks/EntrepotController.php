<?php

namespace App\Http\Controllers\Stocks;

use App\Http\Controllers\Controller;
use App\Http\Requests\EntrepotRequest;
use App\Models\Entrepot;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class EntrepotController extends Controller
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
        $entrepots = Entrepot::all();

        return view('stocks.entrepot.index')->with('entrepots', $entrepots);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('add-entrepot')) {
            return redirect()->route('stocks.entrepot.index');
        }

        $users = User::all();
        $role = Role::all()->where('name', 'encargado')->first();
        $gerants = [];
        foreach ($users as $user) {
            if ($user->roles->pluck('id')->contains($role->id)) {
                $gerants[] = $user;
            }
        }

        return view('stocks.entrepot.add')->with('users', $gerants);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\EntrepotRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(EntrepotRequest $request)
    {
        Entrepot::create($request->all());

        return redirect()->route('stocks.entrepot.index')->with('success', 'Nouvel entrepôt !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Entrepot  $entrepot
     * @return \Illuminate\Http\Response
     */
    public function show(Entrepot $entrepot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Entrepot  $entrepot
     * @return \Illuminate\Http\Response
     */
    public function edit(Entrepot $entrepot)
    {
        if (Gate::denies('edit-entrepot')) {
            return redirect()->route('commercial.transport.index');
        }

        $users = User::all();
        $role = Role::all()->where('name', 'encargado')->first();
        $gerants = [];
        foreach ($users as $user) {
            if ($user->roles->pluck('id')->contains($role->id)) {
                $gerants[] = $user;
            }
        }

        return view('stocks.entrepot.edit', [
            'entrepot' => $entrepot,
            'users' => $gerants
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\EntrepotRequest  $request
     * @param  \App\Models\Entrepot  $entrepot
     * @return \Illuminate\Http\Response
     */
    public function update(EntrepotRequest $request, Entrepot $entrepot)
    {
        $entrepot->localisation = $request->localisation;
        $entrepot->capacite = $request->capacite;
        $entrepot->gerant = $request->gerant;

        $entrepot->save();

        return redirect()->route('stocks.entrepot.index')->with('success', 'Les informations de l\'entrepôt on été modifiés avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Entrepot  $entrepot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entrepot $entrepot)
    {
        if (Gate::denies('delete-entrepot')) {
            return redirect()->route('stocks.entrepot.index');
        }

        $entrepot->delete();

        return redirect()->route('stocks.entrepot.index')->with('success', 'Fallait pas mettre le cendrier à côté des barils d\'essence');
    }
}
