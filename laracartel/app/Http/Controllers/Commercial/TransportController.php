<?php

namespace App\Http\Controllers\Commercial;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Transport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TransportController extends Controller
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
        $transports = Transport::all();

        return view('commercial.transport.index')->with('transports', $transports);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('add-transport')) {
            return redirect()->route('commercial.transport.index');
        }
        $users = User::all();
        $role = Role::all()->where('name', 'repartidor')->first();
        $transporteurs = [];
        foreach ($users as $user) {
            if ($user->roles->pluck('id')->contains($role->id)) {
                $transporteurs[] = $user;
            }
        }

        return view('commercial.transport.add')->with('users', $transporteurs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Transport::create($request->all());

        return redirect()->route('commercial.transport.index')->with('success', 'Nouveau transport disponible !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transport  $transport
     * @return \Illuminate\Http\Response
     */
    public function show(Transport $transport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transport  $transport
     * @return \Illuminate\Http\Response
     */
    public function edit(Transport $transport)
    {
        if (Gate::denies('edit-transport')) {
            return redirect()->route('commercial.transport.index');
        }

        $users = User::all();
        $role = Role::all()->where('name', 'repartidor')->first();
        $transporteurs = [];
        foreach ($users as $user) {
            if ($user->roles->pluck('id')->contains($role->id)) {
                $transporteurs[] = $user;
            }
        }

        return view('commercial.transport.edit', [
            'transport' => $transport,
            'users' => $transporteurs
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transport  $transport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transport $transport)
    {
        $transport->user = $request->user;
        $transport->vehicule = $request->vehicule;
        $transport->depart = $request->depart;
        $transport->destination = $request->destination;

        $transport->save();

        return redirect()->route('commercial.transport.index')->with('success', 'Les informations du transport ont été modifiés avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transport  $transport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transport $transport)
    {
        if (Gate::denies('delete-transport')) {
            return redirect()->route('commercial.transport.index');
        }

        $transport->delete();

        return redirect()->route('commercial.transport.index')->with('success', 'Le véhicule a foncé dans le platane.');
    }
}
