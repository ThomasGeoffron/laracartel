@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Modifier <strong>{{ $transport->name }}</strong></div>

                    <div class="card-body">
                        <form action="{{ route('commercial.transport.update', $transport) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group row">
                                <label for="nom" class="col-md-6 col-form-label">{{ __('Transporteur') }}</label>

                                <div class="col-md-12">
                                    <label for="user">Transporteur</label>
                                    <select name="user" class="form-select">
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}" @if($user->id === $transport->user) selected @endif>{{ $user->name }}</option>
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
                                    <input id="vehicule" type="text" class="form-control @error('vehicule') is-invalid @enderror" name="vehicule" value="{{ old('vehicule') ?? $transport->vehicule }}" required autocomplete="vehicule" autofocus>

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
                                    <input id="depart" type="date" class="form-control @error('depart') is-invalid @enderror" name="depart" value="{{ old('depart') ?? $transport->depart }}" required autocomplete="depart" autofocus>

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
                                    <input id="destination" type="text" class="form-control @error('destination') is-invalid @enderror" name="destination" value="{{ old('destination') ?? $transport->destination }}" required autocomplete="destination" autofocus>

                                    @error('destination')
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
