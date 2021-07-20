<?php

namespace App\Http\Controllers\Stocks;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArmeRequest;
use App\Models\Arme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ArmeController extends Controller
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
        $armes = Arme::all();

        return view('stocks.arme.index')->with('armes', $armes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('add-arme')) {
            return redirect()->route('stocks.arme.index');
        }
        return view('stocks.arme.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ArmeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArmeRequest $request)
    {
        Arme::create($request->all());

        return redirect()->route('stocks.arme.index')->with('success', 'Nouvelle arme disponible !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Arme  $arme
     * @return \Illuminate\Http\Response
     */
    public function show(Arme $arme)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Arme  $arme
     * @return \Illuminate\Http\Response
     */
    public function edit(Arme $arme)
    {
        if (Gate::denies('edit-arme')) {
            return redirect()->route('stocks.arme.index');
        }

        return view('stocks.arme.edit', [
            'arme' => $arme
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ArmeRequest  $request
     * @param  \App\Models\Arme  $arme
     * @return \Illuminate\Http\Response
     */
    public function update(ArmeRequest $request, Arme $arme)
    {
        $arme->designation = $request->designation;
        $arme->description = $request->description;
        $arme->munition = $request->munition;

        $arme->save();

        return redirect()->route('stocks.arme.index')->with('success', 'Arme modifiée avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Arme  $arme
     * @return \Illuminate\Http\Response
     */
    public function destroy(Arme $arme)
    {
        if (Gate::denies('delete-arme')) {
            return redirect()->route('stocks.arme.index');
        }

        $arme->delete();

        return redirect()->route('stocks.arme.index')->with('success', 'On a viré la pétoire');
    }
}
