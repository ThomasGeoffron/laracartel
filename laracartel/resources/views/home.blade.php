@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p class="font-weight-bold">{{ __('Welcome ' . Auth::user()->name. ' !') }}</p>
                </div>
            </div>
            @auth
            <div class="card">
                <div class="card-body list-group">
                    @can('manage-clients')
                        <a class="list-group-item" href="{{ route('commercial.client.index') }}"><button class="btn btn-outline-secondary btn-lg btn-block">Clients</button></a>
                    @endcan
                    @can('manage-users')
                        <a class="list-group-item" href="{{ route('admin.users.index') }}"><button class="btn btn-outline-secondary btn-lg btn-block">Utilisateurs</button></a>
                    @endcan
                    @can('manage-transports')
                        <a class="list-group-item" href="{{ route('commercial.transport.index') }}"><button class="btn btn-outline-secondary btn-lg btn-block">Transports</button></a>
                    @endcan
                    @can('manage-armes')
                        <a class="list-group-item" href="{{ route('stocks.arme.index') }}"><button class="btn btn-outline-secondary btn-lg btn-block">Armes</button></a>
                    @endcan
                    @can('manage-produits')
                        <a class="list-group-item" href="{{ route('stocks.produit.index') }}"><button class="btn btn-outline-secondary btn-lg btn-block">Produits</button></a>
                    @endcan
                    @can('manage-entrepots')
                        <a class="list-group-item" href="{{ route('stocks.entrepot.index') }}"><button class="btn btn-outline-secondary btn-lg btn-block">Entrepôts</button></a>
                    @endcan
                    @can('manage-stocks')
                        <a class="list-group-item" href="{{ route('stocks.stock.index') }}"><button class="btn btn-outline-secondary btn-lg btn-block">Stocks</button></a>
                    @endcan
                    @can('manage-ventes')
                        <a class="list-group-item" href="{{ route('commercial.vente.index') }}"><button class="btn btn-outline-secondary btn-lg btn-block">Ventes</button></a>
                    @endcan
                </div>
            </div>
            @else
            @endauth
        </div>
    </div>
</div>
@endsection
