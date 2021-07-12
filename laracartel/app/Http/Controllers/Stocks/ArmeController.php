<?php

namespace App\Http\Controllers\Stocks;

use App\Http\Controllers\Controller;
use App\Models\Arme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ArmeController extends Controller
{
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Arme::create($request->all());

        return redirect()->route('stocks.arme.index');
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
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Arme  $arme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Arme $arme)
    {
        $arme->designation = $request->designation;
        $arme->description = $request->description;
        $arme->munition = $request->munition;

        $arme->save();

        return redirect()->route('stocks.arme.index');
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

        return redirect()->route('stocks.arme.index');
    }
}
