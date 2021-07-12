@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Liste des transports
                        <a href="{{ route('stocks.produit.create') }}"><button class="btn btn-success btn-sm float-right">+ Ajouter</button></a>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Designation</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">pu</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($produits as $produit)
                                    <tr>
                                        <th scope="row">{{ $produit->id }}</th>
                                        <td>{{ $produit->designation }}</td>
                                        <td>{{ $produit->description }}</td>
                                        <td>{{ $produit->pu }}</td>
                                        <td>
                                            @can('edit-produit')
                                            <a href="{{ route('stocks.produit.edit', $produit->id) }}"><button class="btn btn-warning">Modifier</button></a>
                                            @endcan
                                            @can('delete-produit')
                                            <form action="{{ route('stocks.produit.destroy', $produit->id) }}" method="POST" class="d-inline">
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
