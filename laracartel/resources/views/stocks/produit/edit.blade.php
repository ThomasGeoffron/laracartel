@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Modifier <strong>{{ $produit->designation }}</strong></div>

                    <div class="card-body">
                        <form action="{{ route('stocks.produit.update', $produit) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group row">
                                <label for="designation" class="col-md-6 col-form-label">{{ __('Designation') }}</label>

                                <div class="col-md-12">
                                    <input id="designation" type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" value="{{ old('designation') ?? $produit->designation }}" required autocomplete="designation" autofocus>

                                    @error('designation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-md-6 col-form-label">{{ __('Description ') }}</label>

                                <div class="col-md-12">
                                    <input id="description" type="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') ?? $produit->description }}" required autocomplete="description" autofocus>

                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pu" class="col-md-6 col-form-label">{{ __('pu ') }}</label>

                                <div class="col-md-12">
                                    <input id="pu" type="pu" class="form-control @error('pu') is-invalid @enderror" name="pu" value="{{ old('pu') ?? $produit->pu }}" required autocomplete="pu" autofocus>

                                    @error('pu')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <button class="btn btn-primary">Enregistrer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
