@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Nouveau transport</div>

                    <div class="card-body">
                        <form action="{{ route('commercial.transport.store') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="user" class="col-md-6 col-form-label">Transporteur</label>
                                    <select name="user" class="form-select">
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('nom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="vehicule" class="col-md-6 col-form-label">{{ __('Véhicule') }}</label>

                                <div class="col-md-12">
                                    <input id="vehicule" type="text" class="form-control @error('vehicule') is-invalid @enderror" name="vehicule" value="{{ old('vehicule') }}" required autocomplete="vehicule" autofocus>

                                    @error('vehicule')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="depart" class="col-md-6 col-form-label">{{ __('Départ') }}</label>

                                <div class="col-md-12">
                                    <input id="depart" type="date" class="form-control @error('depart') is-invalid @enderror" name="depart" value="{{ old('depart') }}" required autocomplete="depart" autofocus>

                                    @error('depart')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="destination" class="col-md-6 col-form-label">{{ __('Destination') }}</label>

                                <div class="col-md-12">
                                    <input id="destination" type="text" class="form-control @error('destination') is-invalid @enderror" name="destination" value="{{ old('destination') }}" required autocomplete="destination" autofocus>

                                    @error('destination')
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
