@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Liste des ventes
                        <a href="{{ route('commercial.vente.create') }}"><button class="btn btn-success btn-sm float-right">+ Ajouter</button></a>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Stock</th>
                                    <th scope="col">Transport</th>
                                    <th scope="col">Client</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Quantité</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ventes as $vente)
                                    <tr>
                                        <th scope="row">{{ $vente->id }}</th>
                                        <td>
                                            {{ $vente->stock()->get()->first()->entrepot()->get()->pluck('localisation')->first() }},
                                            {{ $vente->stock()->get()->first()->arme()->get()->pluck('designation')->first() ??
                                               $vente->stock()->get()->first()->produit()->get()->pluck('designation')->first() }}
                                        </td>
                                        <td>
                                            {{ $vente->transport()->get()->first()->user()->get()->pluck('name')->first() }},
                                            {{ $vente->transport()->get()->pluck('vehicule')->first() }},
                                            {{ $vente->transport()->get()->pluck('destination')->first() }}
                                        </td>
                                        <td>{{ $vente->client()->get()->pluck('nom')->first() }}</td>
                                        <td>{{ $vente->date }}</td>
                                        <td>{{ $vente->qte }}</td>
                                        <td>
                                            @can('edit-vente')
                                            <a href="{{ route('commercial.vente.edit', $vente->id) }}"><button class="btn btn-warning">Modifier</button></a>
                                            @endcan
                                            @can('delete-vente')
                                            <form action="{{ route('commercial.vente.destroy', $vente->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Supprimer</button>
                                            </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
