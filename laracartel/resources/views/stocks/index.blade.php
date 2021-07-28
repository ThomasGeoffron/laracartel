@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Liste des stocks
                        <a href="{{ route('stocks.stock.create') }}"><button class="btn btn-success btn-sm float-right">+ Ajouter</button></a>
                    </div>

                    <div class="card-body">
                        <table class="table table-stripes table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Entrepôt</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Désignation</th>
                                    <th scope="col">Quantité</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($stocks as $stock)
                                    <tr>
                                        <th scope="row">{{ $stock->id }}</th>
                                        <td>{{ $stock->entrepot()->get()->pluck('localisation')->first() }}</td>
                                        @if($stock->arme != null)
                                            <td>Arme</td>
                                            <td>{{ $stock->arme()->get()->pluck('designation')->first() }}</td>
                                        @else
                                            <td>Produit</td>
                                            <td>{{ $stock->produit()->get()->pluck('designation')->first() }}</td>
                                        @endif
                                        <td>{{ $stock->qte }}</td>
                                        <td>
                                            @can('edit-stock')
                                            <a href="{{ route('stocks.stock.edit', $stock->id) }}"><button class="btn btn-warning">Modifier</button></a>
                                            @endcan
                                            @can('delete-stock')
                                            <form action="{{ route('stocks.stock.destroy', $stock->id) }}" method="POST" class="d-inline">
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
