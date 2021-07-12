@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Liste des transports
                        <a href="{{ route('stocks.arme.create') }}"><button class="btn btn-success btn-sm float-right">+ Ajouter</button></a>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Designation</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Munition</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($armes as $arme)
                                    <tr>
                                        <th scope="row">{{ $arme->id }}</th>
                                        <td>{{ $arme->designation }}</td>
                                        <td>{{ $arme->description }}</td>
                                        <td>{{ $arme->munition }}</td>
                                        <td>
                                            @can('edit-arme')
                                            <a href="{{ route('stocks.arme.edit', $arme->id) }}"><button class="btn btn-warning">Modifier</button></a>
                                            @endcan
                                            @can('delete-arme')
                                            <form action="{{ route('stocks.arme.destroy', $arme->id) }}" method="POST" class="d-inline">
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
