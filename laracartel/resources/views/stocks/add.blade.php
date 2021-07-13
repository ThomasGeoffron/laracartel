@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Nouvel entrepôt</div>

                    <div class="card-body">
                        <form action="{{ route('stocks.stock.store') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="entrepot" class="col-md-6 col-form-label">Entrepôt</label>
                                    <select name="entrepot" class="form-select">
                                        @foreach($entrepots as $entrepot)
                                            <option value="{{ $entrepot->id }}">{{ $entrepot->localisation }}</option>
                                        @endforeach
                                    </select>

                                    @error('entrepot')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group form-check">
                                <input class="form-check-input" type="radio" name="typeRadio" id="armeRadio" value="arme" checked>
                                <label class="form-check-label" for="armeRadio">Arme</label>
                            </div>
                            <div class="form-group form-check">
                                <input class="form-check-input" type="radio" name="typeRadio" id="produitRadio" value="produit" >
                                <label class="form-check-label" for="produitRadio">Produit</label>
                            </div>
                            <div class="form-group row" id="armeDiv">
                                <div class="col-md-12">
                                    <label for="arme" class="col-md-6 col-form-label">Armes</label>
                                    <select name="arme" class="form-select">
                                        <option value="default" selected>Choisir arme...</option>
                                        @foreach($armes as $arme)
                                            <option value="{{ $arme->id }}">{{ $arme->designation }}</option>
                                        @endforeach
                                    </select>

                                    @error('arme')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row" id="produitDiv">
                                <div class="col-md-12">
                                    <label for="produit" class="col-md-6 col-form-label">Produit</label>
                                    <select name="produit" class="form-select">
                                        <option value="default" selected>Choisir produit...</option>
                                        @foreach($produits as $produit)
                                            <option value="{{ $produit->id }}">{{ $produit->designation }}</option>
                                        @endforeach
                                    </select>

                                    @error('produit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="qte" class="col-md-6 col-form-label">{{ __('Quantité') }}</label>

                                <div class="col-md-12">
                                    <input id="qte" type="text" class="form-control @error('qte') is-invalid @enderror" name="qte" value="{{ old('qte') }}" required autocomplete="qte" autofocus>

                                    @error('qte')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <button class="btn btn-primary">Ajouter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
