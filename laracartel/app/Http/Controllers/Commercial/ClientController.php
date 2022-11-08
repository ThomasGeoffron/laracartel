<?php

namespace App\Http\Controllers\Commercial;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ClientController extends Controller
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
        $client = Client::all();

        return view('commercial.client.index')->with('clients', $client);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('commercial.client.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\ClientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        if (Gate::denies('add-client')) {
            return redirect()->route('commercial.client.index');
        }
        Client::create($request->all());

        return redirect()->route('commercial.client.index')->with('success', 'Un nouveau client ! La PA$$ION !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        if (Gate::denies('edit-client')) {
            return redirect()->route('commercial.client.index');
        }

        return view('commercial.client.edit', [
            'client' => $client
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\ClientRequest  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, Client $client)
    {
        $client->nom = $request->nom;
        $client->raisonsoc = $request->raisonsoc;
        $client->siege = $request->siege;

        $client->save();

        return redirect()->route('commercial.client.index')->with('success', 'Les informations du client ont été modifiés avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        if (Gate::denies('delete-client')) {
            return redirect()->route('commercial.client.index');
        }

        $client->delete();

        return redirect()->route('commercial.client.index')->with('success', 'Au revoir la PA$$ION :(');
    }
}
