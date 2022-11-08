@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        Liste des entrepôts
                        <a href="{{ route('stocks.entrepot.create') }}"><button class="btn btn-success btn-sm float-right">+ Ajouter</button></a>
                    </div>

                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Localisation</th>
                                    <th scope="col">Capacité</th>
                                    <th scope="col">Gérant</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($entrepots as $entrepot)
                                    <tr>
                                        <th scope="row">{{ $entrepot->id }}</th>
                                        <td>{{ $entrepot->localisation }}</td>
                                        <td>{{ $entrepot->capacite }}</td>
                                        <td>{{ $entrepot->gerant()->get()->pluck('name')->first() }}</td>
                                        <td class="col-md-3">
                                            @can('edit-entrepot')
                                            <a href="{{ route('stocks.entrepot.edit', $entrepot->id) }}"><button class="btn btn-warning">Modifier</button></a>
                                            @endcan
                                            @can('delete-entrepot')
                                            <form 
                                            action="{{ route('stocks.entrepot.destroy', $entrepot->id) }}" 
                                            method="POST" 
                                            class="d-inline"
                                            onsubmit="event.preventDefault();"
                                            >
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Exploser</button>
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
