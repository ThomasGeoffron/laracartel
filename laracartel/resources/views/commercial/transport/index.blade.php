@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Liste des transports
                        <a href="{{ route('commercial.transport.create') }}"><button class="btn btn-success btn-sm float-right">+ Ajouter</button></a>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Transporteur</th>
                                    <th scope="col">Véhicule</th>
                                    <th scope="col">Départ</th>
                                    <th scope="col">Destination</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transports as $transport)
                                    <tr>
                                        <th scope="row">{{ $transport->id }}</th>
                                        <td>{{ $transport->user()->get()->pluck('name')->first() }}</td>
                                        <td>{{ $transport->vehicule }}</td>
                                        <td>{{ $transport->depart }}</td>
                                        <td>{{ $transport->destination }}</td>
                                        <td>
                                            @can('edit-users')
                                            <a href="{{ route('commercial.transport.edit', $transport->id) }}"><button class="btn btn-warning">Modifier</button></a>
                                            @endcan
                                            @can('delete-users')
                                            <form action="{{ route('commercial.transport.destroy', $transport->id) }}" method="POST" class="d-inline">
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
