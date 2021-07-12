@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Ajouter un client</div>

                    <div class="card-body">
                        <form action="{{ route('commercial.client.store') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="form-group row">
                                <label for="nom" class="col-md-6 col-form-label">{{ __('Nom') }}</label>

                                <div class="col-md-12">
                                    <input id="nom" type="text" class="form-control @error('name') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autocomplete="nom" autofocus>

                                    @error('nom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="raisonsoc" class="col-md-6 col-form-label">{{ __('Raison Sociale') }}</label>

                                <div class="col-md-12">
                                    <input id="raisonsoc" type="text" class="form-control @error('raisonsoc') is-invalid @enderror" name="raisonsoc" value="{{ old('raisonsoc') }}" required autocomplete="raisonsoc" autofocus>

                                    @error('raisonsoc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="siege" class="col-md-6 col-form-label">{{ __('Siège') }}</label>

                                <div class="col-md-12">
                                    <input id="siege" type="text" class="form-control @error('siege') is-invalid @enderror" name="siege" value="{{ old('siege') }}" required autocomplete="siege" autofocus>

                                    @error('siege')
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
